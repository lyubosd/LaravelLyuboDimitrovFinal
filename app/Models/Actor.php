<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable=[
        'Nombre','Apellidos','FechaDeNacimiento','PaisDeNacimiento','Genero'
    ];


    public function Actor()
    {
        return $this->belongsTo(Pelicula::class);
    }
}
