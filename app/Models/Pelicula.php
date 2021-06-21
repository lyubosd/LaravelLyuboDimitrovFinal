<?php

namespace App\Models;
use App\Http\Controllers\ActorController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $fillable=[
        'Nombre','Director','Genero','Lanzamiento','Duracion', 'EdadMinima','Sinopsis','Valoracion', 'Foto'
    ];



    public function Pelicula()
    {
        return $this->hasMany(Actor::class);
    }
}