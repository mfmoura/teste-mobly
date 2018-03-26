<?php

namespace Mobly\Http\Controllers;

use Illuminate\Http\Request;
use Mobly\produto;
use Mobly\categoria;
use Illuminate\Support\Facades\DB;
use Storage;

class produtos extends Controller
{
    public function index($paginacao = 9, Request $request)
    {
        $produtos = DB::table('produtos')
            ->join('produto_categoria', 'produtos.id', '=', 'produto_categoria.produto' )
        ->select('produtos.nome', 'produtos.preço', 'produtos.descricao', 'produtos.id');

        if (!empty($request->input('search'))) {

            $fuzzy = explode(" ", $request->input('search'));

            foreach ($fuzzy as $value) {

                $produtos->orWhereRaw("nome LIKE '%" . $value ."%'");
                $produtos->orWhereRaw("descricao LIKE '%" . $value ."%'");
            }

        }

        if (!empty($request->input('categoria'))) {
            $produtos->where('produto_categoria.categoria', '=', $request->input('categoria'));
        }

        $produtos = $produtos
            ->groupBy('produtos.id')
            ->orderBy('created_at', 'desc')
     	    ->simplePaginate($paginacao);

        $categorias = DB::table('categorias')->get();
        
        $categorias_com_label[''] = 'Todas as categorias';
        
        foreach($categorias as $categoria){
            $categorias_com_label[$categoria->id] = $categoria->nome;
        }


        return view('site',['Produtos' => $produtos, 'categorias' => $categorias_com_label]);
    }

    public function cadastrar($id = null){
    	    if (!empty($id)){
    			$produto = produto::findOrFail($id);
    		}
    		else 
    			$produto = new produto;

			$produto->preço = number_format($produto->preço, 2);
			$categorias = DB::table('categorias')->get();
			
			foreach($categorias as $categoria){
				$categorias_com_label[$categoria->id] = $categoria->nome;
			}

			$produto_categoria = DB::table('produto_categoria')->where('produto', $produto->id)->get();

			foreach ($produto_categoria as $value) {
				$produtos_categoria[] = $value->categoria;
			}

    		return view('cadastrarProduto',['produto' => $produto, 'categorias' => $categorias_com_label, 'produto_categoria' => $produtos_categoria ?? null ]);    
    }

	public function salvarCadastro(Request $request){
    
    	if ($request->input('_token') !== null) {

    		if (!empty($request->id)){
    			$produto = produto::findOrFail($request->input('id'));
    		}
    		else{
		        $produto = new produto;
    		}
			
			$produto->nome = $request->input('nome');
			$produto->descricao = $request->input('descricao');
			$produto->preço = str_replace(",", ".", $request->input('preço'));

			$salvaProduto = $produto->save();

			DB::table('produto_categoria')->where('produto', $produto->id)->delete();

			foreach ($request->input('categorias') as $value) {
				$inserts_produto_categoria[] = ["categoria" => $value , "produto" => $produto->id]; 
			}

			DB::table('produto_categoria')->insert($inserts_produto_categoria);

			if ($request->hasfile('imagem')) {
				
				$nomedoarquivo = $produto->id . "." . $request->imagem->extension();
				$upload = $request->file('imagem')->storeAs('/img/produtos', $nomedoarquivo);
				$produto->imagem = $nomedoarquivo;
				$salvaProduto = $produto->save();
			}

			$message = "Cadastrado com sucesso!";
	
    	}
    	else{
    		$message = "Ocorreu um erro ao enviar a requisição";
    	}

        return redirect()->route('produtos.editar',['id' => $produto->id])->with('message', $message);
    	// return view('cadastrarProduto',['message', $message]);

    }

    public function apagarImagem($id){

    	$produto = produto::findOrFail($id);
    	
    	Storage::delete('/img/produtos/' . $produto->imagem);
    	$produto->imagem = NULL;
		$salvaProduto = $produto->save();
    	

    	$message = "Apagado com sucesso!";

        return redirect()->route('produtos.editar',['id' => $produto->id])->with('message', $message);
    }

}
