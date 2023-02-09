<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function view()
    {
        $cart = Auth::user()->cartProducts()->get();

        return view('pages.order', compact('cart'));
    }

    public function store(OrderRequest $request)
    {
        $cart = Auth::user()->cartProducts()->get();
        $total = Auth::user()->getTotalCartPrice();

        $order = Auth::user()->orders()->create(array_merge($request->validated(), ['total' => $total]));

        Session::put('orderConfirmed', "order-user-".Auth::id());

        $cart->each(function ($item) use ($order) {
            $order->items()->create([
                'product_id' => $item->id,
                'name' => $item->name,
                'description' => $item->description,
                'quantity' => $item->pivot->quantity,
                'price' => $item->price,
            ]);
        });

        Auth::user()->cart()->delete();

        return redirect('/');
    }
}
