<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;
use App\Models\Tenant;
use App\Services\PessoaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{

    public function index()
    {
        $empresas = Empresa::select()
            ->with([
                'pessoa.pessoa_juridica',
                'pessoa.endereco',
                'pessoa.telefones',
            ]);

        return response()->json($empresas, 200);
    }

    public function store(EmpresaRequest $request)
    {
        $data = $request->all();

        $tenant = Tenant::create();

        $empresa = new Empresa();
        $empresa->tenant()->associate($tenant);

        DB::transaction(function () use ($empresa, $data) {

            $pessoa = PessoaService::create($data);
            $empresa->pessoa()->associate($pessoa);
            $empresa->save();

        });

        return response()->json($empresa, 201);
    }

    public function show(Empresa $empresa)
    {
        $empresa->load([
            'pessoa.pessoa_juridica',
            'pessoa.endereco',
            'pessoa.telefones',
        ]);

        return response()->json($empresa, 200);
    }

    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        $data = $request->all();

        DB::transaction(function () use ($empresa, $data) {
            $pessoa = PessoaService::update($data, $empresa->pessoa);
            $empresa->pessoa()->associate($pessoa);
            $empresa->save();
        });

        return response()->json($empresa, 200);

    }

    public function destroy(Empresa $empresa)
    {
        //
    }
}
