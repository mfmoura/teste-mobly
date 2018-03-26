<?php

namespace Mobly\Http\Controllers;

use Illuminate\Http\Request;
use Mobly\token;
use Mobly\pedido;
use Illuminate\Support\Facades\DB;

class pedido extends Controller
{
    public function salvaPedido(Request $request){

    	$pedido = new pedido;

    	$token = token::findOrFail($request->session($request->session()->get('token');

    	$pedido;


    }

    public function exibePedidos(){

    }
}
