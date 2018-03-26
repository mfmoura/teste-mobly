@extends('layouts.app')

@section('content')

	<div class="container">
		
		<div class="row">
			<div class="col-md">
				<h1>Confira seus dados</h1>
			</div>
		</div>
		
		<hr>
		
		<div class="row">
			<div class="col-md">
				<p>Confira seus dados. Caso esteja OK, salvaremos seu pedido</p>
			</div>
		</div>

		<div class="text-light bg-dark rounded px-4">

			<div class="row">
				<div class="col_md"><b>Nome: </b>{{$user->name}}</div>
			</div>
			<div class="row">
				<div class="col_md"><b>Email: </b>{{$user->email}}</div>
			</div>
			<div class="row">
				<div class="col_md"><b>CPF: </b>{{$usuarioInfo->cpf}}</div>
			</div>
			<div class="row">
				<div class="col_md"><b>RG: </b>{{$usuarioInfo->rg}}</div>
			</div>
			<div class="row">
				<div class="col_md"><b>CEP: </b>{{$usuarioInfo->cep}}</div>
			</div>
			<div class="row">
				<div class="col_md"><b>Endereço: </b>{{$usuarioInfo->endereco}}</div>
			</div>
			<div class="row">
				<div class="col_md"><b>Bairro: </b>{{$usuarioInfo->bairro}}</div>
			</div>
			<div class="row">
				<div class="col_md"><b>Cidade: </b>{{$usuarioInfo->cidade}}</div>
			</div>
			<div class="row">
				<div class="col_md"><b>Estado: </b>{{$usuarioInfo->estado}}</div>
			</div>
			<div class="row">
				<div class="col_md"><b>Telefone: </b>{{$usuarioInfo->telefone1}}</div>
			</div>
			<div class="row">
				<div class="col_md"><b>Telefone: </b>{{$usuarioInfo->telefone2}}</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md">
				<div class="btn-group" role="group" aria-label="Basic example">
				  <button type="button" class="btn btn-success" onclick="window.location = '{{ route('pedido.salvar')}}'">Finalizar compras</button>
				  <button type="button" class="btn btn-primary" onclick="window.location = '{{ route('user.info') }}'">Editar dados</button>
				</div>					
			</div>
			
		</div>
	</div>

@endsection