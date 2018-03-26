<?php

namespace Mobly\Http\Controllers;

use Illuminate\Http\Request;
use Mobly\token;
use Mobly\token_produto;
use Illuminate\Support\Facades\DB;

class token_produto_controller extends Controller
{

    public function validarToken(Request $request){

        if(!$request->session()->has('token')){

            $token = new token;
            $token->save();

            $request->session()->put('token', $token->id);
        }
        else{
            $token = token::findOrFail($request->session()->get('token'));
        }
    }

    public function adicionarProduto(Request $request){

        $this->validarToken($request);

        $token_produto = new token_produto;
        
        $token_produto->token = $request->session()->get('token');
        $token_produto->produto = $request->input('id');
        $token_produto->qtd = $request->input('qtd');

        $token_produto->save();

        return redirect()->route('index.index');
    }

    public function listCarrinho($paginacao = 10, Request $request){
        
        $this->validarToken($request);

        $produtos = DB::table('token_produto')
            ->join('produtos', "produtos.id", "=", "token_produto.produto")
            ->select(DB::raw('SUM(qtd) as qtd, produtos.id, produtos.nome, produtos.descricao, produtos.preço * SUM(qtd) as preço, produtos.imagem'))
            ->where('token', $request->session()->get('token'))
            ->groupBy('produtos.id')
            ->simplePaginate($paginacao);

        $total = DB::table('token_produto')
            ->join('produtos', "produtos.id", "=", "token_produto.produto")
            ->select(DB::raw('produtos.preço * SUM(qtd) as preço'))
            ->where('token', $request->session()->get('token'))
            ->groupBy('token_produto.token')->get()->toArray();

        return view('carrinho', ['produtos' => $produtos ?? null, 'total' => $total[0]->preço ?? null]);

    }


}
