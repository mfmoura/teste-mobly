<?php

namespace Mobly\Http\Controllers;

use Illuminate\Http\Request;
use Mobly\usuarioInfo;
use Mobly\user;
use Mobly\token_produto;

class userInfo extends Controller
{
    public function salvaInfo(Request $request){

    	if ($request->input('id') !== null){
	    	$usuarioInfo = usuarioInfo::findOrFail($request->input('id'));

    	}
    	else{
    		$usuarioInfo = new usuarioInfo;
    	}

   		$user = user::findOrFail(auth()->user()->id);

    	$usuarioInfo->user = auth()->user()->id;
		$usuarioInfo->endereco = $request->input('endereco');
		$usuarioInfo->bairro = $request->input('bairro');
		$usuarioInfo->cidade = $request->input('cidade');
		$usuarioInfo->estado = $request->input('estado');
		$usuarioInfo->telefone1 = $request->input('telefone1');
		$usuarioInfo->telefone2 = $request->input('telefone2');
		$usuarioInfo->cep = $request->input('cep');
		$usuarioInfo->cpf = $request->input('cpf');
		$usuarioInfo->rg = $request->input('rg');

		$usuarioInfo->save();

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->save();

        return redirect()->route('user.info');

    }

    public function recuperaInfo(){

   		$user = user::findOrFail(auth()->user()->id);
    	$usuarioInfo = usuarioInfo::where('user', auth()->user()->id)->first();

    	return view('dadosPessoais', ['usuarioInfo' => $usuarioInfo, 'user' => $user] );
    }

    public function conferir(){

        $user = user::findOrFail(auth()->user()->id);
        $usuarioInfo = usuarioInfo::where('user', auth()->user()->id)->first();

        return view('conferirDados', ['usuarioInfo' => $usuarioInfo, 'user' => $user] );    

    }
}
