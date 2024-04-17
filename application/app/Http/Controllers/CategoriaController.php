<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with([
                'subcategorias',
            ])
            ->where('categoria_id', null)
            ->get();

        return response()->json($categorias, 200);
    }

    public function store(CategoriaRequest $request)
    {
        $data = $request->all();

        $categoria = Categoria::create($data);

        return response()->json($categoria, 201);

    }

    public function show(Categoria $categoria)
    {
        return response()->json(
            Categoria::with([
                'subcategorias',
            ])->find($categoria->id), 200);
    }

    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $data = $request->all();

        $categoria->update($data);

        return response()->json($categoria, 200);

    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->json(null, 204);
    }
}
