<?php

namespace Mobly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mobly\categoria;


class categorias extends Controller
{
    public function list($paginacao = 10){
    	$categorias = DB::table('categorias')->simplePaginate($paginacao);

    	return view('categorias', ['categorias' => $categorias]);
    }

    public function editar($id = null){

    	if (!empty($id)){
    		$categoria = categoria::findOrFail($id);
    	}
    	else{
    		$categoria = new categoria;
    	}

    	return view('categoriaEditar', ['categoria' => $categoria ?? null]);

    }

    public function editarSalvar(Request $request){

    	if (!empty($request->input('id'))){
    		$categoria = categoria::findOrFail($request->input('id'));
    	}
    	else{
    		$categoria = new categoria;
    	}

    	$categoria->nome = $request->input('nome');
    	$categoria->save();

        return redirect()->route('categoria.list');

    }

    public function apagar($id){

   		categoria::find($id)->delete();
        return redirect()->route('categoria.list');

    }
}
