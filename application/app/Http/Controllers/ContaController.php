<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{

    public function store(ContaRequest $request)
    {
        $data = $request->all();

        $conta = Conta::create($data);

        return response()->json($conta, 201);
    }

    public function show(Conta $conta)
    {
        return response()->json($conta, 200);
    }

    public function update(ContaRequest $request, Conta $conta)
    {
        $data = $request->all();

        $conta->update($data);

        return response()->json($conta, 200);
    }

    public function destroy(Conta $conta)
    {
        $conta->delete();
        return response()->json(null, 204);
    }
}
