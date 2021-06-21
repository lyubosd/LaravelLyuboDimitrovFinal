<?php

namespace App\Http\Controllers;


use App\Models\Actor;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $actores['actores']=Pelicula::join("actors","peliculas.id","=","actors.pelicula_id")->get();
        $peliculas['peliculas']=Pelicula::all();
        return view ('actor.index',$actores, $peliculas);
    }


    /**
     * Show the form for creating a new resource.
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peliculas=Pelicula::all();
        return view('actor.create',compact('peliculas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'FechaDeNacimiento'=>'required',
            'PaisDeNacimiento'=>'required|string|max:100',
            'Genero'=>'required',
            'Foto'=>'required|max:1000|mimes:jpeg,png,jpg' ,
            'pelicula_id'

        ];


        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La Foto es requerida'
        ];


        $this->validate($request, $campos, $mensaje);


        $datosActor = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosActor['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Actor::insert($datosActor);



       return redirect('actor')->with('mensaje','Actor agregado con éxito');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Pelicula  $pelicula
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        return view ('actores.show', compact('actor','peliculas'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Pelicula  $pelicula
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        $peliculas= Pelicula::all();

        return view('actor.edit', compact('actor','peliculas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'FechaDeNacimiento'=>'required',
            'PaisDeNacimiento'=>'required|string|max:100',
            'Genero'=>'required',
            'pelicula_id'

        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:1000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La Foto es requerida'];
        }

        $this->validate($request, $campos, $mensaje);


        $datosActor= request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $actor=Actor::findOrFail($id);

            Storage::delete('public/'.$actor->Foto);

            $datosActor['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Actor::where('id','=',$id)->update($datosActor);
        $actor=Actor::findOrFail($id);


        return redirect('actor')->with('mensaje','Actor Modificado', );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actor=Actor::findOrFail($id);

        if(Storage::delete('public/'.$actor->Foto)){

            Actor::destroy($id);
        }





        return redirect('actor')->with('mensaje','Actor Borrado con exito');
    }
}
