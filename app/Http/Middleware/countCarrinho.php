<?php

namespace Mobly\Http\Middleware;

use Closure;
use Mobly\Http\Controllers\token_produto_controller;
use Mobly\token;
use Illuminate\Support\Facades\DB;

class countCarrinho
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!$request->session()->has('token')){

            $token = new token;
            $token->save();

            $request->session()->put('token', $token->id);
        }
        else{
            $token = token::findOrFail($request->session()->get('token'));
        }

        $countCarrinho = DB::table('token_produto')
            ->join('produtos', "produtos.id", "=", "token_produto.produto")
            ->select(DB::raw('SUM(qtd) as qtd, produtos.id, produtos.nome, produtos.descricao, produtos.preço * SUM(qtd) as preço, produtos.imagem'))
            ->where('token', $request->session()->get('token'))
            ->groupBy('produtos.id')->get()->count();
        
        $request->session()->put('countCarrinho', $countCarrinho);
        
        return $next($request);
    }
}
