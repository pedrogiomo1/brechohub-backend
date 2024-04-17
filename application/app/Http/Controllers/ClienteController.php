<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Services\PessoaService;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with([
                'pessoa.pessoa_fisica',
                'pessoa.endereco',
            ])
            ->get();

        return response()->json($clientes, 200);
    }

    public function store(ClienteRequest $request)
    {
        $data = $request->all();

        $cliente = new Cliente();

        DB::transaction(function () use ($cliente, $data) {
            $pessoa = PessoaService::create($data);
            $cliente->pessoa()->associate($pessoa);
            $cliente->save();
        });

        return response()->json($cliente, 201);

    }

    public function show(Cliente $cliente)
    {
        return response()->json(
            Cliente::with([
                'pessoa.pessoa_fisica',
                'pessoa.endereco',
                'pessoa.telefones',
            ])->find($cliente->id), 200);
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $data = $request->all();

        DB::transaction(function () use ($cliente, $data) {
            $pessoa = PessoaService::update($data, $cliente->pessoa);
            $cliente->pessoa()->associate($pessoa);
            $cliente->save();
        });

        return response()->json($cliente, 200);

    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json(null, 204);
    }
}
