@extends('layouts.app')

@section('content')

<div class="container">
<body style="background-image: url({{asset('/storage/img/peliculas.png')}})">
<form action="{{ url('/pelicula') }}" method="post" enctype="multipart/form-data">

@csrf
@include('pelicula.form',['modo'=>'Crear'])

</form>
</body>
</div>
@endsection