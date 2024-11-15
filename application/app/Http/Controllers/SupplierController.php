<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use App\Services\PersonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with([
                'person.natural_person',
                'person.address',
            ])
            ->get();

        return response()->json($suppliers, 200);
    }

    public function store(SupplierRequest $request)
    {
        $data = $request->all();

        $supplier = new Supplier($data);

        DB::transaction(function () use ($supplier, $data) {
            $person = PersonService::create($data);
            $supplier->person()->associate($person);
            $supplier->save();
        });

        return response()->json($supplier, 201);

    }

    public function show(Supplier $supplier)
    {
        return response()->json(
            Supplier::with([
                'person.natural_person',
                'person.address',
                'person.phones',
            ])->find($supplier->id), 200);
    }

    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $data = $request->all();

        DB::transaction(function () use ($supplier, $data) {
            $person = PersonService::update($data, $supplier->person);
            $supplier->person()->associate($person);
            $supplier->save();
        });

        return response()->json($supplier, 200);

    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return response()->json(null, 204);
    }
}
