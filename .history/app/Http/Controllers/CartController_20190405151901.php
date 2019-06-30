<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Cart;

class CartController extends Controller
{
    
    public function index() {
        return view('cart');
    }

    public function add() {
        dd(request()->all());

        $product = Product::find(request()->product_id);
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'qty' => request()->product_qty,
            'price' => $product->product_price,
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

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