@extends('plantilla')
  @section('seccion')

    <h1 class="display-4">Notas</h1>

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

    <form action="{{route('notas.crear')}}" method="post">
      @csrf
      <input type="text" name="nombre" placeholder="nombre" class="form-control mb-2" value="{{old('nombre')}}"> <!-- name igual a campo de bd -->
      <input type="text" name="descripcion" placeholder="descripcion" class="form-control mb-2" value="{{old('descripcion')}}">
      <button class="btn btn-primary btn-block mb-5" type="submit">New</button>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($notas as $item)
          <tr>
            <th scope="row"> 
              
              <a href={{route('notas.detalle', $item)}}>
                {{$item->id}}
              </a>
            </th>
            <td>{{$item->nombre}}</td>
            <td>{{$item->descripcion}}</td>
            <td>
              <a href="{{route('notas.editar', $item)}}" class="btn btn-warning btn-sm">Editar</a>

              <form class="d-inline" method="post" action="{{route('notas.eliminar', $item)}}">  
                  @method('DELETE')
                  @csrf
                  <button class=" btn btn-danger btn-sm"> 
                      Eliminar
                  </button>
              </form>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{ $notas->links('pagination::bootstrap-4') }}
  @endsection
      