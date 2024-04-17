<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();

        return response()->json($grades, 200);
    }

    public function store(GradeRequest $request)
    {
        $data = $request->all();

        $grade = Grade::create($data);

        return response()->json($grade, 201);

    }

    public function show(Grade $grade)
    {
        return response()->json(Grade::find($grade->id), 200);
    }

    public function update(GradeRequest $request, Grade $grade)
    {
        $data = $request->all();

        $grade->update($data);

        return response()->json($grade, 200);

    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return response()->json(null, 204);
    }
}
