@extends('layouts.app')

@section('content')
<div class="container">
<body style="background-image: url({{asset('/storage/img/actores.jpg')}})">
<form action="{{ url ('/actor/'.$actor->id) }}" method="post" enctype="multipart/form-data">
@csrf 
{{ method_field('PATCH') }} 

@include('actor.form',['modo'=>'Editar'])

</form>
</div>
@endsection