

@extends('layouts.app')

@section('content')

<div class="container">
<body style="background-image: url({{asset('/storage/img/peliculas.png')}})">
<form action="{{ url ('/pelicula/'.$pelicula->id) }}" method="post" enctype="multipart/form-data">
@csrf 
{{ method_field('PATCH') }} 

@include('pelicula.form',['modo'=>'Editar'])

</form>
</div>
@endsection