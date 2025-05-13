<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


// Un Artículo hasMany comentarios
class Articulo extends Model
{
    use HasFactory;
    
    protected $table = 'articulos';
    protected $fillable = ['titulo', 'contenido', 'autor', 'fecha_publicacion'];
    
    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }
}

/*
fillable o guarded son propiedades obligatorias porque todos los modelos Eloquent están protegidos contra vulnerabilidades 
de asignación masiva por defecto.
Con fillable se define qué atributos del modelo se pueden asignar en masa.
https://laravel.com/docs/11.x/eloquent#mass-assignment-exceptions
*/