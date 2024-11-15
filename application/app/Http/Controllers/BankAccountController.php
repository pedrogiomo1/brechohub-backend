<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankAccountRequest;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{

    public function store(BankAccountRequest $request)
    {
        $data = $request->all();

        $bankAccount = BankAccount::create($data);

        return response()->json($bankAccount, 201);
    }

    public function show(BankAccount $bankAccount)
    {
        return response()->json($bankAccount, 200);
    }

    public function update(BankAccountRequest $request, BankAccount $bankAccount)
    {
        $data = $request->all();

        $bankAccount->update($data);

        return response()->json($bankAccount, 200);
    }

    public function destroy(BankAccount $bankAccount)
    {
        $bankAccount->delete();
        return response()->json(null, 204);
    }
}
