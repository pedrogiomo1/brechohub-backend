<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductImageRequest;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{

    public function store(ProductImageRequest $request)
    {
        $data = $request->all();

        $data['file'] = $request->file('file_upload')->store('products');

        $productImage = ProductImage::create($data);

        return  response()->json($productImage, 201);
    }

    public function destroy(ProductImage $productImage)
    {
        if ($productImage->file)Storage::delete($productImage->file);

        $productImage->delete();
    }

}
