<?php

namespace App\Http\Controllers;

use App\Http\Requests\FornecedorRequest;
use App\Models\Fornecedor;
use App\Services\PessoaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::with([
                'pessoa.pessoa_fisica',
                'pessoa.endereco',
            ])
            ->get();

        return response()->json($fornecedores, 200);
    }

    public function store(FornecedorRequest $request)
    {
        $data = $request->all();

        $fornecedor = new Fornecedor();

        DB::transaction(function () use ($fornecedor, $data) {
            $pessoa = PessoaService::create($data);
            $fornecedor->pessoa()->associate($pessoa);
            $fornecedor->save();
        });

        return response()->json($fornecedor, 201);

    }

    public function show(Fornecedor $fornecedor)
    {
        return response()->json(
            Fornecedor::with([
                'pessoa.pessoa_fisica',
                'pessoa.endereco',
                'pessoa.telefones',
            ])->find($fornecedor->id), 200);
    }

    public function update(FornecedorRequest $request, Fornecedor $fornecedor)
    {
        $data = $request->all();

        DB::transaction(function () use ($fornecedor, $data) {
            $pessoa = PessoaService::update($data, $fornecedor->pessoa);
            $fornecedor->pessoa()->associate($pessoa);
            $fornecedor->save();
        });

        return response()->json($fornecedor, 200);

    }

    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();
        return response()->json(null, 204);
    }
}
