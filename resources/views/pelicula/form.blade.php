<body style="background-image: url({{asset('/storage/img/peliculas.png')}})">
<h1 class="display-1 text-white">{{$modo}} Pelicula</h1>



@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
    @foreach( $errors->all() as $error)
    <li>  {{ $error }}  </li>
          @endforeach

    </ul>
</div>

@foreach( $errors->all() as $error)
    {{ $error}}
@endforeach

@endif
<div class="form-group pt-2 p-2 mb-2 bg-dark text-white" style="opacity:0.9">
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{ isset($pelicula->Nombre)?$pelicula->Nombre:''  }}" id="Nombre">
</div>

<div class="form-group pt-2 p-2 mb-2 bg-dark text-white">
    <label for="Genero">Genéro</label>
    <select value="{{ isset($pelicula->Genero)?$pelicula->Genero:old('Genero') }}" class="form-select" name="Genero" id="Genero" aria-label="Genero">
        <option value="accion">Acción</option>
        <option value="aventuras">Aventuras</option>
        <option value="cienciaFiccion">Ciencia Ficción</option>
        <option value="comedia">Comedia</option>
        <option value="crimen">Crimen</option>
        <option value="drama">Drama</option>
        <option value="romance">Romance</option>
        <option value="fantasia">Fantasía</option>
        <option value="terror">Terror</option>
        <option value="musical">Musical</option>
        <option value="guerra">Guerra</option>

        <option value="sin_especificar">No especificado</option>
    </select>
</div>




<div class="form-group pt-2 p-2 mb-2 bg-dark text-white" style="opacity:0.9">
    <label for="Director">Director</label>
    <input type="text" class="form-control" name="Director" value="{{ isset($pelicula->Director)?$pelicula->Director:''  }}" id="Director">
</div>

<div class="form-group pt-2 p-2 mb-2 bg-dark text-white" style="opacity:0.9">
    <label for="Duracion">Duración</label>
    <input type="text" class="form-control" name="Duracion" value="{{ isset($pelicula->Duracion)?$pelicula->Duracion:''  }}" id="Duracion">
</div>

<div class="form-group pt-2 p-2 mb-2 bg-dark text-white" style="opacity:0.9">
    <label for="EdadMinima">Edad Minima</label>
    <input type="number" min="0" class="form-control" name="EdadMinima" value="{{ isset($pelicula->EdadMinima)?$pelicula->EdadMinima:0  }}" id="EdadMinima">
</div>

<div class="form-group pt-2 p-2 mb-2 bg-dark text-white" style="opacity:0.9">
    <label for="Valoracion">Valoración</label>
    <input type="number" min="0" max="10" step="0.1" class="form-control" name="Valoracion" value="{{ isset($pelicula->Valoracion)?$pelicula->Valoracion:0  }}" id="Valoracion">
</div>

<div class="form-group pt-2 p-2 mb-2 bg-dark text-white" style="opacity:0.9">
    <label for="Sinopsis">Sinopsis</label>
    <textarea class="form-control" id="Sinopsis" name="Sinopsis" value="{{isset($pelicula->Sinopsis)?$pelicula->Sonopsis:''}}" rows="3"></textarea>
</div>


<div class="form-group pt-2 p-2 mb-2 bg-dark text-white" style="opacity:0.9">
    <label for="Lanzamiento">Lanzamiento</label>
    <input type="date" class="form-control" value="{{ isset($pelicula->Lanzamiento)?$pelicula->Año:old('Lanzamiento') }}" name="Lanzamiento" id="Lanzamiento">
</div>

<div class="form-group pt-2 p-2 mb-2 bg-dark text-white" style="opacity:0.9">
<label for="Foto">Foto</label>
@if(isset($pelicula->Foto))
<img style="width: 110px; height: 110px;" class="img-thumbnail img-" src="{{ asset('storage').'/'.$pelicula->Foto }}" att="">
@endif
<input type="file" value="" name="Foto" id="Foto" style="opacity:0.9">
</div>

<div class="pt-3">
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
</div>

<div class="pt-3">
<a href="{{ url('pelicula/') }}" class="btn btn-outline-secondary" role="button">Volver</a>
</div>