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
		<div class="list-group col-md">
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
			<div class="list-group-item">
				<h3>Sem itens no carrinho.</h3>	
			</div>
		@endforelse
		</div>
	</div>

	@if ($produtos->count() > 0)
	<div class="row">
		<div class='col-md'>
			<h3>Total: R$ {{ number_format($total, 2, ",", ".") }}</h3>
		</div>
	</div>
	@endif

	<div class="row">
		<div class="col-md">
			<div class="btn-group" role="group" aria-label="Basic example">
			  @if ($produtos->count() > 0)
			  <button type="button" class="btn btn-success" onclick="window.location = '{{ route('pedido.conferirDados')}}'">Finalizar compras</button>
			  @endif
			  <button type="button" class="btn btn-primary" onclick="window.location = '{{ route('index.index') }}'">Voltar ao site</button>
			</div>			
		</div>		
	</div>
</div>
@endsection