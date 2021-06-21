@extends('layouts.app')

@section('content')


<div class="container">
<body style="background-image: url({{asset('/storage/img/peliculas.png')}})">

<div>
    <h1 class="display-1 text-white">Peliculas</h1>
    </div>
    
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}   
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>

    </div>

    @endif

    <a href="{{ url('pelicula/create') }}" class="btn btn-warning"> Añadir pelicula</a>
<br>
<br>


<table class="table table-light "  style="background: #343a40; ">
  <thead class="thead-dark">
    
    <tr>
      <th>#</th>
      <th>Foto</th>
      <th>Nombre</th>
      <th>Genero</th>
      <th>Director</th>
      <th>Duración</th>
      <th>Edad Minima</th>
      <th>Valoración</th>
      <th>Sinopsis</th>
      <th>Lanzamiento</th>
    </tr>
  </thead>
  <tbody >
  @foreach( $peliculas as $pelicula )
    <tr class="table table-dark table-sm">
      <td class="pt-4">{{ $pelicula->id }}</td>

      <td><img  class="img-thumbnail img-"  style="width: 70px; height: 70px;" src="{{ asset('storage').'/'.$pelicula->Foto }}" att=""></td>

      <td class="pt-4">{{ $pelicula->Nombre }}</td>
      <td class="pt-4">{{ $pelicula->Genero }}</td>
      <td class="pt-4">{{ $pelicula->Director }}</td>
      <td class="pt-4">{{ $pelicula->Duracion }}</td>
      <td class="pt-4">{{ $pelicula->EdadMinima }}</td>
      <td class="pt-4">{{ $pelicula->Valoracion }}</td>
      <td class="pt-4">{{ $pelicula->Sinopsis }}</td>
      <td class="pt-4">{{ $pelicula->Lanzamiento }}</td>

     
      <td class="pt-4">
      <div class="p-2 d-inline">
        <a href="{{ url('/pelicula/'.$pelicula->id.'/edit') }}" class="btn btn-outline-info btn-sm">Editar</a> 
      </div>
       | 
      

      <form action="{{ url('/pelicula/'.$pelicula->id) }}" method="post" class="d-inline p-2">
      @csrf
      {{ method_field('DELETE') }}
      <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-outline-secondary btn-sm">
      </form>
      </td>
    </tr>
@endforeach
    </tbody>
</table> 
{!! $peliculas->links()!!}
</div>

</body>
  </tbody>
</table>
@endsection