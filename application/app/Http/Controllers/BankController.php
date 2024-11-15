<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        return response()->json(Bank::all(), 200);
    }

    public function show(Bank $bank)
    {
        return response()->json($bank, 200);
    }

}
