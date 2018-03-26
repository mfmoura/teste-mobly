@extends('layouts.app')

<script>
 
	function editaCategoria(id = ''){

		$.ajax({
			url: "/admin/categorias/editar/" + id,
		 	context: document.body,
		 	beforeSend: function(){
		 			if (id == '') {
		 				$(".modal-title").html('Inserir nova categoria');
		 			}
		 			else{
		 				$(".modal-title").html('Editar categoria');
		 			}

					$('.modal-body > p').html('');
			 		$("#spinner_modal").show();
					$('.modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>')       

		 		},
		 	complete: function(){
		 			$("#spinner_modal").hide();
		 		}
		}).done(function(data) {
			$('.modal-body > p').html(data);
			$('.modal-footer').html('{!! Form::submit('Salvar', ['class' => 'btn btn-success', 'form' => 'categorias-form']); !!} <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>')       
		});

	}

	function redirDel(id){
		window.location = "/admin/categorias/apagar/" + id;
	}

	function deletaCategoria(id){
		$(".modal-title").html('Editar categoria');
 			$("#spinner_modal").hide();
			$('.modal-body > p').html('Deseja mesmo apagar a categoria?');
			var button = "<button class='btn btn-danger' onclick='redirDel(" + id + ")'>Apagar</button>"; 
			$('.modal-footer').html(button + '<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Fechar</button>'); 
	}

</script>

@section('content')

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
        <p></p>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>

<div class="container">
	<div class="row">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="editaCategoria();">Nova categoria</button>
	</div>
	
	<br>
	
	<div class="row">

		<ul class="list-group col-sm">
		@foreach ($categorias as $categoria)
		<li class="list-group-item">{{ $categoria->nome }} <div class="btn-group float-right">
			  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal" onclick="editaCategoria('{{$categoria->id}}')">Editar</button>
			  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="deletaCategoria('{{$categoria->id}}')">Apagar</button>
			</div>
		</li>
		@endforeach
		</ul>
		
	</div>

    <div class="row">
        <div class="col-sm">
            {{ $categorias->links() }}            
        </div>
    </div>
</div>

@endsection