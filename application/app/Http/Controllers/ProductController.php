<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json($products, 200);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        if ($request->file('file_upload')) {
            $data['file'] = $request->file('file_upload')->store('products');
        }

        $product = Product::create($data);

        return response()->json($product, 201);

    }

    public function show(Product $product)
    {
        $product->load([
            'category',
            'supplier.person',
            'images',
        ]);
        return response()->json($product, 200);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();

        if ($request->file('file_upload')) {
            if ($product->file)Storage::delete($product->file);
            $data['file'] = $request->file('file_upload')->store('products');
        }

        $product->update($data);

        return response()->json($product, 200);

    }

    public function destroy(Product $product)
    {

        if ($product->file){
            Storage::delete($product->file);
        }

        $product->delete();
        return response()->json(null, 204);
    }
}
