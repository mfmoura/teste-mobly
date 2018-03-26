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
			@foreach
			<li class="list-group-item">Cras justo odio</li>
			@empty
			<li class="list-group-item">Sem pedidos.</li>
			@endforeach
		<ul>
	</div>

@endsection