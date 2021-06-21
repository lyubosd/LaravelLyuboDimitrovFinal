@extends('layouts.app')

@section('content')

<div class="container">
<body style="background-image: url({{asset('/storage/img/actores.jpg')}})">
    <div>
        <h1 class="display-1 text-white">Actores</h1>
    </div>


    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>

    @endif



    <a href="{{ url('actor/create') }}" class="btn btn-warning"> Añadir Actor</a>
    <br>
    <br>

    <table class="table table-light" style="background: #343a40;color:#fff">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>FechaDeNacimiento</th>
                <th>PaisDeNacimiento</th>
                <th>Genero</th>
                <th>Pelicula</th>
            </tr>
        </thead>

        @foreach ($actores as $actor )

        <tbody>
            <tr>
                <td>{{ $actor->id }}</td>

                <td>
                    <img class="img-thumbnail img-" style="width: 50px; height: 50px;" src="{{ asset('storage').'/'.$actor->Foto }}" att="">
                </td>

                <td>{{ $actor->Nombre }}</td>
                <td>{{ $actor->Apellidos }}</td>
                <td>{{ $actor->FechaDeNacimiento }}</td>
                <td>{{ $actor->PaisDeNacimiento }}</td>
                <td>{{ $actor->Genero }}</td>

                @foreach ($peliculas as $pelicula)
                @if($pelicula->id===$actor->pelicula_id)
                <td>{{ $pelicula->Nombre }}</td>
                @endif
                @endforeach
                <td>

                    <a href="{{ url('/actor/'.$actor->id.'/edit')}}" class="btn btn-dark">
                        Editar
                    </a>


                    <form action="{{url('/actor/'.$actor->id) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}

                        <input class="btn btn-warning" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
@endsection
