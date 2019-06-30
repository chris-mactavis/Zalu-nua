<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductAttribute;
use App\ProductAttributeOption;
use Illuminate\Http\Request;

class ProductAttributesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index()
    {
        $product_attributes = ProductAttribute::with('options')->latest()->get();

        return view('admin.products.product_attributes', compact('product_attributes'));
    }

    public function store(Request $request)
    {
        $product_attribute = ProductAttribute::create([
            'attribute' => $request->name
        ]);

        foreach ($request->option as $option) {
            $product_attribute->options()->create([
                'option' => $option
            ]);
        }

        return ProductAttribute::with('options')->latest()->get();
    }

    public function update(Request $request, ProductAttribute $product_attribute)
    {
        $product_attribute->update([
            'attribute' => $request->attribute
        ]);

        foreach ($request->options as $option) {
            if (!$product_attribute->options()->whereOption($option['option'])->exists()) {
                $product_attribute->options()->create([
                    'option' => $option['option']
                ]);
            } else {
                ProductAttributeOption::whereProductAttributeId($product_attribute->id)->whereOption($option['option'])->update(['option' => $option['option']]);
            }
        }

        return ProductAttribute::with('options')->latest()->get();
    }

    public function destroy(ProductAttribute $product_attribute)
    {
        $product_attribute->options()->delete();
        $product_attribute->delete();
    }
}
