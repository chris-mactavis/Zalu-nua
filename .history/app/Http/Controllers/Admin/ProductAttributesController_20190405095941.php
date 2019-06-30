<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductAttribute;

class ProductAttributesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index()
    {
        $product_attributes = ProductAttribute::with('options')->get()
        return view('admin.products.product_attributes');
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

        return $product_attribute->options()->get();
    }
}
