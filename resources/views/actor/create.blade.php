@extends('layouts.app')

@section('content')
<div class="container">
<body style="background-image: url({{asset('/storage/img/actores.jpg')}})">

<form action="{{url ('/actor') }}" method="post" enctype="multipart/form-data" > 
@csrf

@include('actor.form',['modo'=>'Crear'])


</form>
</div>

</body>
</div>
@endsection