@extends('plantilla')
  @section('seccion')
  	<h1>editar nota Id: {{$nota->id}}</h1>
  	
  	@if(session('mensaje'))
      <div class="alert alert-success">
        {{session('mensaje')}}
      </div>
    @endif

    @error('nombre')
      <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
        El nombre es obligatorio
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @enderror

    @error('descripcion')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      La descripción es requerida
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @enderror

    <form action="{{route('notas.update', $nota->id)}}" method="post">
    	@method('PUT')
      	@csrf
      	<input type="text" name="nombre" placeholder="nombre" class="form-control mb-2" value="{{$nota->nombre}}"> <!-- name igual a campo de bd -->
      	<input type="text" name="descripcion" placeholder="descripcion" class="form-control mb-2" value="{{$nota->descripcion}}">
      	<button class="btn btn-warning btn-block mb-5" type="submit">Editar</button>
    </form>

  @endsection