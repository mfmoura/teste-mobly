<?php

namespace Mobly\Http\Controllers;

use Illuminate\Http\Request;
use Mobly\token;
use Mobly\pedido;
use Mobly\token_produto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class pedidos extends Controller
{
    public function salvaPedido(Request $request){

        $pedido = new pedido;

        $token = token::findOrFail($request->session()->get('token'));

        $pedido = new pedido;

        $pedido->user = Auth::user()->id;
        $pedido->save();

        $token->pedido = $pedido->id;
        $token->user = Auth::user()->id;

        $produtos = DB::table('token_produto')
            ->join('produtos', "produtos.id", "=", "token_produto.produto")
            ->select(DB::raw('SUM(qtd) as qtd, produtos.id, produtos.nome, produtos.descricao, produtos.preço * SUM(qtd) as preço'))
            ->where('token', $request->session()->get('token'))
            ->groupBy('produtos.id')
            ->get();
        
        foreach ($produtos as $key => $value) {
            $itens_pedido[] = ['qtd' => $value->qtd, 'produto' => $value->id, 'pedido' => $pedido->id];
        }

        DB::table('pedido_produto')->insert($itens_pedido);

        $request->session()->forget('token');

        return redirect()->route("index.index");

    }

    public function exibePedidos(Request $request, $isAdmin = false){
        $sql = "SELECT LPAD(pedidos.id, 8, 0) as chave, SUM(totais.total) as total_valor, name, email, usuario_info.*
                        FROM pedidos
                        INNER JOIN (SELECT pedido_produto.id as id, SUM(qtd) * produtos.`preço` as total, pedido_produto.pedido
                                FROM pedido_produto
                                INNER JOIN produtos ON pedido_produto.produto = produtos.id
                                GROUP BY pedido_produto.id) as totais on totais.pedido = pedidos.id
                        INNER JOIN users e on e.id = pedidos.user
                        LEFT JOIN usuario_info ON usuario_info.user = pedidos.user ";

        echo $request->isAdmin;

        if ($isAdmin){
            $titulo = "Todos os pedidos";
        }
        else{
            $sql .= "WHERE pedidos.user = " . Auth::user()->id . " "; 
            $titulo = "Seus pedidos";
        }

        $sql .= "GROUP BY pedidos.id";

        $pedidos = DB::select( DB::raw($sql) );
    
        return view('pedidos', ['pedidos' => $pedidos, 'titulo' => $titulo]);
    }

    public function exibeTodosPedidos(Request $request){
    	return $this->exibePedidos($request, true);
    }
}