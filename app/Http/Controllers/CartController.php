<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->cartProducts()->get();

        return view('pages.cart', compact('cart'));
    }

    public function store(CartRequest $request)
    {
        $cart = Auth::user()->getCartFromProduct($request->input('product_id'));

        if (blank($cart)) {
            Auth::user()->cart()->create($request->validated());
        }

        return response()->noContent();
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response()->noContent();
    }
}
