@extends('layouts.app')

@section('content')
<div class="container">

		@if (isset($message))

		<div class="row">
			<div class="col-sm">
				<div class="alert alert-success" role="alert">
				 	{{{ $message }}}
				</div>
			</div>
			
		</div>
		@endif


	    <div class="row">
            <div class="col-sm-6">
									            
				{!! Form::model($produto, ['url' => '/admin/produtos/cadastrar/salvar', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
				
				{!! Form::hidden('id', $value = null) !!}

				<div class='form-group'>
					{!! Form::label('nome', 'Nome do produto:', $attributes = []) !!}
					{!! Form::text('nome', null, ['placeholder' => 'Nome', 'class' => 'form-control', 'required' => 'required']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('descricao', 'Descrição:', $attributes = []) !!}
					{!! Form::text('descricao', null, ['placeholder' => 'Descrição', 'class' => 'form-control', 'required' => 'required']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('preço', 'Preço:', $attributes = []) !!}
					<div class="input-group">
					  	<div class="input-group-prepend">
					    	<span class="input-group-text" id="basic-addon">R$</span>
						</div>
						{!! Form::text('preço', null, ['class' => 'form-control money', 'required' => 'required', 'aria-describedby' => 'basic-addon']) !!}
					</div>
				</div>

				<div class='form-group'>
					{!! Form::label('imagem', 'Foto do Produto:', $attributes = []) !!}
					{!! Form::file('imagem', $attributes = ['class' => 'form-control']) !!}
				</div>
				
				@if ($produto->imagem !== NULL)
				<div class="form-group">
					<p>Imagem cadastrada:</p>
					<button type="button" class="btn btn-danger" onclick="window.location = '/admin/produtos/cadastrar/apagarImagem/{{ $produto->id }}';">Apagar</button>
					<img src="{{ url('storage/img/produtos/' . $produto->imagem) }}" class="img-thumbnail">


				</div>
				@endif
				
				<div class='form-group'>
					{!! Form::label('categorias', 'Categorias:', $attributes = []) !!}
					{!! Form::select('categorias[]', $categorias, $produto_categoria ?? null, ['required' => true, 'multiple' => true, 'class' => 'form-control']) !!}
				</div>

				{!! Form::submit('Enviar Agora', ['class' => 'btn btn-success']); !!}

				{!! Form::close() !!}

	        </div>
	    </div>
    <br>
</div>
@endsection
