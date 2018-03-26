@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md">
				<h3>{{ $titulo }}</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-md">
				<hr>
			</div>			
		</div>
				
		<ul class="list-group">
			@forelse  ($pedidos as $pedido)
			<li class="list-group-item">
				<b>Pedido: </b> #{{$pedido->chave}} - <b>Usuário: </b> {{$pedido->name}} - <b>Total: </b> R${{$pedido->total_valor}}
			</li>
			@empty
			<li class="list-group-item">Sem pedidos.</li>
			@endforelse
		<ul>
	</div>

@endsection