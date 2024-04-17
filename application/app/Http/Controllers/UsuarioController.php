<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\PessoaService;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return response()->json($usuarios, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $usuario = new Usuario();

        DB::transaction(function () use ($usuario, $data) {
            $pessoa = PessoaService::create($data);
            $usuario->pessoa()->associate($pessoa);
            $usuario->save();
        });

        return response()->json($usuario, 201);

    }

    public function show(Usuario $usuario)
    {
        return response()->json(Usuario::with([
                'pessoa.pessoa_fisica',
                'pessoa.endereco',
                'pessoa.telefones',
            ])->find($usuario->id), 200);
    }

    public function update(Request $request, Usuario $usuario)
    {
        $data = $request->all();

        DB::transaction(function () use ($usuario, $data) {
            $pessoa = PessoaService::update($data, $usuario->pessoa);
            $usuario->pessoa()->associate($pessoa);
            $usuario->save();
        });

        return response()->json($usuario, 200);

    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json(null, 204);
    }

}
