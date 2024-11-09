<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('empresa', \App\Http\Controllers\EmpresaController::class);
Route::apiResource('banco', \App\Http\Controllers\BancoController::class)->only('index', 'show');

Route::middleware([\Stancl\Tenancy\Middleware\InitializeTenancyByRequestData::class])->group(function () {

    Route::apiResource('usuario', \App\Http\Controllers\UsuarioController::class);
    Route::apiResource('cliente', \App\Http\Controllers\ClienteController::class);
    Route::apiResource('fornecedor', \App\Http\Controllers\FornecedorController::class);
    Route::apiResource('categoria', \App\Http\Controllers\CategoriaController::class)->parameter('categoria', 'categoria');
    Route::apiResource('produto', \App\Http\Controllers\ProdutoController::class);
    Route::apiResource('produtofoto', \App\Http\Controllers\ProdutoFotoController::class)->only('store', 'destroy');
    Route::apiResource('grade', \App\Http\Controllers\GradeController::class);
    Route::apiResource('gradeitem', \App\Http\Controllers\GradeItemController::class)->only('store', 'update', 'destroy');
    Route::apiResource('conta', \App\Http\Controllers\ContaController::class, ['parameters' => ['conta' => 'conta']])->except('index');

});
