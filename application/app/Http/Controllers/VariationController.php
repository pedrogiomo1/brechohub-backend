<?php

namespace App\Http\Controllers;

use App\Http\Requests\VariationRequest;
use App\Models\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    public function index()
    {
        $variations = Variation::select()
            ->with(['items'])
            ->get();
        return response()->json($variations, 200);
    }

    public function store(VariationRequest $request)
    {
        $data = $request->all();

        $variation = Variation::create($data);

        return response()->json($variation, 201);

    }

    public function show(Variation $variation)
    {
        $variation->load('items');

        return response()->json($variation, 200);
    }

    public function update(VariationRequest $request, Variation $variation)
    {
        $data = $request->all();

        $variation->update($data);

        return response()->json($variation, 200);

    }

    public function destroy(Variation $variation)
    {
        $variation->delete();
        return response()->json(null, 204);
    }
}
