<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoFotoRequest;
use App\Models\ProdutoFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoFotoController extends Controller
{

    public function store(ProdutoFotoRequest $request)
    {
        $data = $request->all();

        $data['arquivo'] = $request->file('arquivo_upload')->store('produtos');

        $produtoFoto = ProdutoFoto::create($data);

        return  response()->json($produtoFoto, 201);
    }

    public function destroy(ProdutoFoto $produtofoto)
    {
        if ($produtofoto->arquivo)Storage::delete($produtofoto->arquivo);

        $produtofoto->delete();
    }

}
