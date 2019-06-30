<?php

namespace App\Http\Controllers;

use App\Product;

use App\ProductAttribute;

use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    
    public function index() {
        return view('cart');
    }

    public function add() {
        $attributes = [];
        foreach (ProductAttribute::all() as $attr) {
            
        }
        return request()->all();
        $product = Product::find(request()->product_id);
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'qty' => request()->product_qty,
            'price' => $product->product_price,
            'variants' => request()->product_variant
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');
        Session::push('selectedVariant', ['product_id' => $product->id, 'attributes' => request()->product_attribute]);
        
        return redirect('cart');
    }

    public function incr($id, $qty) {
        Cart::update($id, $qty + 1);
        return redirect()->back();
    }

    public function decr($id, $qty) {
        Cart::update($id, $qty - 1);
        return redirect()->back();
    }

    public function delete($id) {
        $rowId = $id;
        Cart::remove($rowId);
        return redirect('cart');
    }

    public function destroy() {
        Cart::destroy();
        return redirect('cart');
    }

}
