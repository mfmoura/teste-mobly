	{!! Form::model($categoria, ['url' => '/admin/categorias/salvar/', 'enctype' => 'multipart/form-data', 'id' => 'categorias-form']) !!}
	
	{!! Form::hidden('id', $value = null) !!}
	
	{!! Form::label('nome', 'Nome da Categoria:', []) !!}
	{!! Form::text('nome', null, ['class' => 'form-control', 'required' => 'required']) !!}

	{!! Form::close() !!}
