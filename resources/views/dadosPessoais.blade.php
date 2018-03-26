@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

		{!! Form::model($usuarioInfo, ['url' => route('user.info.salvar')]) !!}

		{!! Form::hidden('id', $value = null) !!}


		<div class='form-group'>
			{!! Form::label('name', 'Nome completo:', $attributes = []) !!}
			{!! Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required']) !!}
		</div>

		<div class='form-group'>
			{!! Form::label('email', 'Email:', $attributes = []) !!}
			{!! Form::text('email', $user->email, ['class' => 'form-control', 'required' => 'required']) !!}
		</div>

		<div class='form-group'>
			{!! Form::label('cpf', 'CPF:', $attributes = []) !!}
			{!! Form::text('cpf', null, ['class' => 'form-control cpf', 'required' => 'required']) !!}
		</div>

		<div class='form-group'>
			{!! Form::label('rg', 'RG:', $attributes = []) !!}
			{!! Form::text('rg', null, ['class' => 'form-control rg']) !!}
		</div>


		<hr>

		<div class='form-group'>
			{!! Form::label('cep', 'CEP:', $attributes = []) !!}
			{!! Form::text('cep', null, ['class' => 'form-control cep', 'required' => 'required']) !!}
		</div>

		<div class='form-group'>
			{!! Form::label('endereco', 'Endereço completo:', $attributes = []) !!}
			{!! Form::text('endereco', null, ['placeholder' => 'Ex: Av. Paulista n. 1500', 'class' => 'form-control', 'required' => 'required']) !!}
		</div>

		<div class='form-group'>
			{!! Form::label('bairro', 'Bairro:', $attributes = []) !!}
			{!! Form::text('bairro', null, ['class' => 'form-control', 'required' => 'required']) !!}
		</div>

		<div class='form-group'>
			{!! Form::label('cidade', 'Cidade:', $attributes = []) !!}
			{!! Form::text('cidade', null, ['class' => 'form-control', 'required' => 'required']) !!}
		</div>

		<div class='form-group'>
			{!! Form::label('estado', 'UF:', $attributes = []) !!}
			{!! Form::text('estado', null, ['placeholder' => 'Ex: São Paulo', 'class' => 'form-control', 'required' => 'required']) !!}
		</div>
		
		<div class='form-group'>
			{!! Form::label('telefone1', 'Telefone para contato:', $attributes = []) !!}
			{!! Form::text('telefone1', null, ['class' => 'form-control phone', 'required' => 'required']) !!}
		</div>

		<div class='form-group'>
			{!! Form::label('telefone2', 'Telefone para contato:', $attributes = []) !!}
			{!! Form::text('telefone2', null, ['placeholder' => 'Só é obrigatório um', 'class' => 'form-control phone']) !!}
		</div>

		<div class="row">
			{!! Form::submit('Enviar Agora', ['class' => 'btn btn-success']); !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection