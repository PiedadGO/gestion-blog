<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

//Cada comentario pertenece a un único Ártículo
class Comentario extends Model
{
    use HasFactory; 

    protected $table = 'comentarios';
    protected $fillable = ['contenido', 'autor', 'fecha_publicacion', 'id_articulo'];

    public function articulo(): BelongsTo
    {
        return $this->belongsTo(Articulo::class);
    }
}
