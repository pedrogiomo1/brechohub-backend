<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeItemRequest;
use App\Models\GradeItem;
use Illuminate\Http\Request;

class GradeItemController extends Controller
{

    public function store(GradeItemRequest $request)
    {
        $data = $request->all();

        $gradeItem = GradeItem::create($data);

        return response()->json($gradeItem, 201);

    }

    public function update(GradeItemRequest $request, GradeItem $gradeItem)
    {
        $data = $request->all();

        $gradeItem->update($data);

        return response()->json($gradeItem, 200);

    }

    public function destroy(GradeItem $gradeItem)
    {
        $gradeItem->delete();
        return response()->json(null, 204);
    }
}
