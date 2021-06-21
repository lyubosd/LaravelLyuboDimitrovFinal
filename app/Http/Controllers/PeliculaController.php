<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['peliculas']=Pelicula::paginate(5);
        return view('pelicula.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelicula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Genero'=>'required|string|max:100',
            'Director'=>'required|string|max:100',
            'Duracion'=>'required|integer|max:1000',
            'EdadMinima'=>'required|integer|max:18',
            'Valoracion'=>'required|numeric|max:10',
            'Sinopsis'=>'required|string|max:1000',    
            'Lanzamiento'=>'required',    
            'Foto'=>'required|max:1000|mimes:jpeg,png,jpg' 
        ];
    
        $mensaje=[
            'required'=>'El :attribute es requerido',           
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:1000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La Foto es requerida']; 
        }

        $this->validate($request, $campos, $mensaje);



        $datos = request()->except("_token");
        
        if($request->hasFile('Foto')){
            $datos['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Pelicula::insert($datos);
        return redirect('pelicula')->with('mensaje','Pelicula agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        return view ('pelicula.show',compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelicula $pelicula)
    {
        return view('pelicula.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Genero'=>'required|string|max:100',
            'Director'=>'required|string|max:100',
            'Duracion'=>'required|integer|max:1000',
            'EdadMinima'=>'required|integer|max:18',
            'Valoracion'=>'required|numeric|max:10',
            'Sinopsis'=>'required|string|max:1000',    
            'Lanzamiento'=>'required',     
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',           
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:1000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La Foto es requerida']; 
        }

        $this->validate($request, $campos, $mensaje);


        $datosPelicula = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $pelicula=Pelicula::findOrFail($id);

            Storage::delete('public/'.$pelicula->Foto);

            $datosPelicula['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Pelicula::where('id','=',$id)->update($datosPelicula);
        $pelicula=Pelicula::findOrFail($id);
        
        return redirect('pelicula')->with('mensaje','Pelicula Modificada con exito');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $pelicula=Pelicula::findOrFail($id);

        if(Storage::delete('public/'.$pelicula->Foto)){
           
            Pelicula::destroy($id);
        }

        return redirect('pelicula')->with('mensaje','anime Borrado');
    }
}
