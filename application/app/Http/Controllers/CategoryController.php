<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with([
                'subcategories',
            ])
            ->where('category_id', null)
            ->get();

        return response()->json($categories, 200);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        $category = Category::create($data);

        return response()->json($category, 201);

    }

    public function show(Category $category)
    {
        return response()->json(
            Category::with([
                'subcategories',
            ])->find($category->id), 200);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();

        $category->update($data);

        return response()->json($category, 200);

    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }
}
