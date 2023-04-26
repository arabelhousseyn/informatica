<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\States\Order\Shipment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('user')->get();

        return view('dashboard.pages.order.index', compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Order $order): View
    {
        $order->load(['items.product']);

        return view('dashboard.pages.order.show', compact('order'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $order->update(['status' => Shipment::getMorphClass()]);

        return redirect()->back();
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->back();
    }
}
