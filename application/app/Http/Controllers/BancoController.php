<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    public function index()
    {
        return response()->json(Banco::all(), 200);
    }

    public function show(Banco $banco)
    {
        return response()->json($banco, 200);
    }

}
