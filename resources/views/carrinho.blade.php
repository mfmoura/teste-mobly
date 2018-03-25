@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
		<h1 class="col-md">Carrinho de compras</h1>
	</div>
	
	<div class="row">
		<hr class="col-md">
	</div>

	<div class="row">
		<div class="list-group">
		@forelse ($produtos as $produto)
			<div class="list-group-item">
				<img src="{{ (empty($produto->imagem))? asset('img/photo.jpg') : url('storage/img/produtos/' . $produto->imagem) }}" style="max-width: 250px;	max-height: 250px;" class="img-thumbnail rounded float-left">
				<h2>{{$produto->nome}}</h2>
				<hr>
				<p>{{$produto->descricao}}</p>
				<p>Quantidade: {{$produto->qtd}}</p>
				<h3>Preço total: R$ {{number_format($produto->preço, 2, ",", ".")}}</h3>
			</div>
		@empty
			<div>
				Sem itens no carrinho.	
			</div>
		@endforelse
		</div>
	</div>

	<div class="row">
		<div class="col-md">
			<div class="btn-group" role="group" aria-label="Basic example">
			  <button type="button" class="btn btn-success">Finalizar compras</button>
			  <button type="button" class="btn btn-primary onclick='window.location = '/'">Voltar ao site</button>
			</div>			
		</div>		
	</div>
</div>
@endsection