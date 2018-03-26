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