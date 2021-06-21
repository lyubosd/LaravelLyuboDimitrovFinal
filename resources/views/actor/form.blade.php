<body style="background-image: url({{asset('/storage/img/actores.jpg')}})">

    <h1 display-1 text-white>{{$modo}} Actor</h1>

<div class="container">
    @if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>

    @foreach( $errors->all() as $error)
    {{ $error}}
    @endforeach

    @endif

    <div class="form-group table-dark" style="opacity:0.9">
        <label for="Nombre"> Nombre </label>
        <input type="text" name="Nombre" class="form-control" value="{{ isset($actor->Nombre)?$actor->Nombre:old('Nombre') }}" id="Nombre">
    </div>

    <div class="form-group table-dark" style="opacity:0.9">
        <label for="Apellidos"> Apellidos </label>
        <input type="text" name="Apellidos" class="form-control" value="{{ isset($actor->Apellidos)?$actor->Apellidos:old('Apellidos') }}" id="Apellidos">
    </div>

    <div class="form-group" style="opacity:0.9">
        <label for="Pelicula" class="form-label  pt-2 table-dark ">Pelicula</label>
        <select class="form-select" name="pelicula_id" id="pelicula_id" aria-label="Default select example">
            @foreach ($peliculas as $pelicula)
            <option value="{{$pelicula->id}}" id="pelicula_id">{{$pelicula->Nombre}}</option>
            @endforeach
        </select>

        <div class="form-group pt-2" style="opacity:0.9">

     <div class="form-group pt-2 table-dark" style="opacity:0.9">
    <label for="Lanzamiento">Fecha de nacimiento</label>
    <input type="date" class="form-control" value="{{ isset($actor->FechaDeNacimiento)?$actor->Año:old('FechaDeNacimiento') }}" name="FechaDeNacimiento" id="FechaDeNacimiento">
</div>

<div class="form-group pt-2 table-dark" style="opacity:0.9">
        <label for="PaisDeNacimiento"> Pais de nacimiento </label>
        <input type="text" name="PaisDeNacimiento" class="form-control" value="{{ isset($actor->PaisDeNacimiento)?$actor->PaisDeNacimiento:old('PaisDeNacimiento') }}" id="Nombre">
    </div>

    <div class="form-group pt-2 table-dark" style="opacity:0.9">
    <label for="Genero">Genéro</label>
    <select value="{{ isset($actor->Genero)?$actor->Genero:old('Genero') }}" class="form-select" name="Genero" id="Genero" aria-label="Genero">
        <option value="hombre">Hombre</option>
        <option value="mujer">Mujer</option>
        <option value="sin_especificar">Prefiero no decirlo</option>
    </select>
    </div>
</div>

        

        <div class="form-group pt-2 table-dark" style="opacity:0.9">
            <label for="Nombre"></label>
            @if(isset($actor->Foto))
            <img style="width: 110px; height: 110px;" class="img-thumbnail img-" src="{{ asset('storage').'/'.$actor->Foto }}" att="">
            @endif
        
            <input type="file" value="" name="Foto" id="Foto">
        </div>

        <input class="btn btn-success" type="submit" value="{{ $modo }} datos">

        <a class="btn btn-primary " href="{{ url('actor') }}"> Volver</a>

       

