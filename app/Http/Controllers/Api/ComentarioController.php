<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Articulo;



class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Comentario::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request, $articulo_id)
    //contenido autor fecha_publicacion id_articulo
    {
        $validated = $request->validate(
            [
                'contenido' => 'required|string|min:1',
                'autor' => 'required|string|max:100',
                'fecha_publicacion' => 'nullable|date',
                //'id_articulo' => 'required|integer|exists:articulos,id',

            ],
            [
                'contenido.required' => 'El comentario no puede estar vacío',
                'autor.required' => 'Debes introducir el nombre del autor',
                'fecha_publicacion.date' => 'La fecha de publicación debe tener un formato válido (Ejemplo: "2025-01-30 12:21:59").',
                'id_articulo.required' => 'Debes identificar el artículo al que asociar este comentario',
                //'id_articulo.exists' => 'El artículo especificado no existe',
            ]
        );

        $articulo = Articulo::find($articulo_id);
        if (!$articulo) {
            return response()->json(['error' => 'Artículo no encontrado'], 404);
        }else{
            $validated['fecha_publicacion'] = $validated['fecha_publicacion'] ?? now();
            $validated['id_articulo'] = $articulo_id;
            $comentario = Comentario::create($validated);
            return response()->json($comentario, 201);
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comentario = Comentario::findOrFail($id);
        return response()->json($comentario);
    }

    /**
     * Update the specified resource in storage.
     * Meditada posibilidad de permitir mover un comentario de un artículo a otro. Se decide no permitir la opción de cambiar a qué 
     * artículo está asociado el comentario. Si, por error, se asocia un comentario a un artículo diferente, procedería borrar el comentario
     * incorrectamente asociado y generarlo de nuevo en el artículo correcto
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'contenido' => 'sometimes|required|string|min:1',
            'autor' => 'sometimes|required|string|max:100',
            'fecha_publicacion' => 'nullable|date',
        ]);
        $comentario = Comentario::findOrFail($id);
        $comentario->update($validated);
        return response()->json($comentario, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Comentario::findOrFail($id)->delete();
        return response()->json(['message' => 'Comentario eliminado correctamente'], 200);
    }
}
