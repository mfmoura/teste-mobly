<?php

namespace Mobly\Http\Controllers\;



class pedidosController extends Controller
{
    public function salvaPedido(Request $request){

    	$pedido = new pedido;

    	$token = token::findOrFail($request->session()->get('token'));

    	$pedido = new pedido;

    	$pedido->user = Auth::user()->id;
    	$pedido->salvar();

    	$token->pedido = $pedido->id;
    	$token->user = Auth::user()->id;

        $produtos = DB::table('token_produto')
            ->join('produtos', "produtos.id", "=", "token_produto.produto")
            ->select(DB::raw('SUM(qtd) as qtd, produtos.id, produtos.nome, produtos.descricao, produtos.preço * SUM(qtd) as preço'))
            ->where('token', $request->session()->get('token'))
            ->groupBy('produtos.id')
            ->get();
        
        foreach ($produtos as $key => $value) {
        	$itens_pedido[] = ['qtd' => $value->qtd, 'produto' => $value->id, 'token' => $request->session()->get('token')];
        }

        DB::table('pedido_produto')->insert($itens_pedido[]);

        return redirect()->route("index.index");

    }

    public function exibePedidos(Request $request, $user = false){
    	$pedidos = DB::table('pedido');

    	if (empty($user))
    		$pedidos->where('user', '=', Auth::user()->id);
    
    	return view('pedidos', ['pedidos' => $pedidos]);
    }
}
