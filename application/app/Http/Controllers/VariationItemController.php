<?php

namespace App\Http\Controllers;

use App\Http\Requests\VariationItemRequest;
use App\Models\VariationItem;
use Illuminate\Http\Request;

class VariationItemController extends Controller
{

    public function store(VariationItemRequest $request)
    {
        $data = $request->all();

        $variationItem = VariationItem::create($data);

        return response()->json($variationItem, 201);

    }

    public function update(VariationItemRequest $request, VariationItem $variationItem)
    {
        $data = $request->all();

        $variationItem->update($data);

        return response()->json($variationItem, 200);

    }

    public function destroy(VariationItem $variationItem)
    {
        $variationItem->delete();
        return response()->json(null, 204);
    }
}
