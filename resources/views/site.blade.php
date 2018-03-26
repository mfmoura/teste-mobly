@extends('layouts.app')

@section('content')

<script>

    function comprarModal(id){
        $(".modal-title").html('Adicionar ao carrinho');
            $("#spinner_modal").hide();
            $('#id').val(id);
            $('#qtd').val("1");
    }

</script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <img src="{{ asset('img/spinner.gif')}}" class="text-center" id="spinner_modal" style="display: none">
        <p>Deseja adicionar o item ao carrinho?</p>
        {!! Form::open(['route' => 'token.adicionarProduto', 'id' => 'adicionarProduto']) !!}
        {!! Form::hidden('id', null, ['id' => 'id']) !!}
        {!! Form::label('qtd', 'Quantidade:', []) !!}{!! Form::number('qtd', 1, ['class' => 'form-control', 'required' => 'required']) !!}
      </div>
      <div class="modal-footer">
        {!! Form::submit('Adicionar', ['class' => 'btn btn-success', 'form' => 'adicionarProduto']); !!}
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>

<div class="container">
    
    <div class='row'>
        <div class="col-sm">
        </div>
    </div>

    <div class="card-columns">
        @foreach ($Produtos as $produto)
        <div class="row">
                <div class="col-sm-3">
                    
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">{{{ $produto->nome }}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">R$ ({{{ number_format($produto->preço, 2, ",", ".") }}})</h6>
                        <p class="card-text"><img align="left" class="img-thumbnail rounded" style="margin: 5px; max-width: 64px; max-height: 64px;" src="{{ (empty($produto->imagem))? asset('img/photo.jpg') : url('storage/img/produtos/' . $produto->imagem) }}">{{{ substr($produto->descricao, 0, 250) }}} {{strlen($produto->descricao) > 250 ? "..." : ""}}</p>
                        <div class="btn-group float-right" role="group">
                            @if(isset(Auth::user()->level) && Auth::user()->level == 1)
                            <button class="btn btn-dark" onclick="window.location = '{{ route('produtos.cadastrar') ."/". $produto->id }}'">Editar produto</button>
                            @endif
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="comprarModal({{$produto->id}})">Comprar</button>
                        </div>

                        <br>
                      </div>
                    </div>

                </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm">
            {{ $Produtos->links() }}            
        </div>
    </div>
</div>
@endsection
