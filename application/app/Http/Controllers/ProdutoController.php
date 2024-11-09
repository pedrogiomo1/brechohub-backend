<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return response()->json($produtos, 200);
    }

    public function store(ProdutoRequest $request)
    {
        $data = $request->all();

        if ($request->file('imagem_file')) {
            $data['imagem'] = $request->file('imagem_file')->store('produtos');
        }

        $produto = Produto::create($data);

        return response()->json($produto, 201);

    }

    public function show(Produto $produto)
    {
        return response()->json($produto, 200);
    }

    public function update(ProdutoRequest $request, Produto $produto)
    {
        $data = $request->all();

        if ($request->file('image_file')) {
            if ($produto->imagem)Storage::delete($produto->imagem);
            $data['imagem'] = $request->file('imagem_file')->store('produtos');
        }

        $produto->update($data);

        return response()->json($produto, 200);

    }

    public function destroy(Produto $produto)
    {

        if ($produto->imagem){
            Storage::delete($produto->imagem);
        }

        $produto->delete();
        return response()->json(null, 204);
    }
}
