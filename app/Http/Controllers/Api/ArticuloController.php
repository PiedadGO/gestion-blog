<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articulo;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Articulo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    //titulo contenido autor fecha_publicacion;
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:55',
            'contenido' => 'required|string|min:1',
            'autor' => 'required|string|max:100',
            'fecha_publicacion' => 'nullable|date',
        ], [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max.string' => 'La longitud del título no puede exceder de 55 caracteres',
            'contenido.required' => 'El artículo no puede estar vacío.',
            'autor.required' => 'Debe introducir el nombre del autor.',
            'fecha_publicacion.date' => 'La fecha de publicación debe tener un formato válido (Ejemplo: "2025-01-30 12:21:59").'
        ]);
        $validated['fecha_publicacion'] = $validated['fecha_publicacion'] ?? now();
        $articulo = Articulo::create($validated);
        return response()->json($articulo, 201); // 201 -> Éxito en la creación
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$articulo = Articulo::findOrFail($id);
        //return response()->json($articulo);

        try {
            $articulo = Articulo::findOrFail($id);
            return response()->json($articulo);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Artículo no encontrado',
                'codigo' => 404
            ], 404);
        }
        //$articulo = Articulo::findOrFail($id);
        //$respuesta = response()->json($articulo);
        //return response()->json($articulo);

        /*if ($respuesta->ok()) {
            dd($respuesta);
        } else {
            dd("Artículo no encontrado, 404");
        }*/
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articulo = Articulo::find($id);

        if ($articulo){
            $validated = $request->validate([
                'titulo' => 'sometimes|required|string|max:55',
                'contenido' => 'sometimes|required|string|min:1',
                'autor' => 'sometimes|required|string|max:100',
                'fecha_publicacion' => 'nullable|date',
            ],[
                'titulo.required' => 'El título es obligatorio.',
                'titulo.max.string' => 'La longitud del título no puede exceder de 55 caracteres',
                'contenido.required' => 'El artículo no puede estar vacío.',
                'autor.required' => 'Debe introducir el nombre del autor.',
                'fecha_publicacion.date' => 'La fecha de publicación debe tener un formato válido (Ejemplo: "2025-01-30 12:21:59").'
            ]);
            $articulo->update($validated);
            return response()->json($articulo, 200); // 200-> Ëxito en la actualización y eliminación
        }else{
            return response()->json(['mensaje' => 'Artículo no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Articulo::findOrFail($id)->delete();
        //return response()->json(['message' => 'Artículo eliminado correctamente'], 200); // 200-> Ëxito en la actualización y eliminación
        try {
            Articulo::findOrFail($id)->delete();
            return response()->json(['message' => 'Artículo eliminado correctamente'], 200); // 200-> Ëxito en la actualización y eliminación
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Artículo no encontrado',
                'codigo' => 404
            ], 404);
        }
    }
}
