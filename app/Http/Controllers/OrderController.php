<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->get();

        foreach ($orders as $order) {
            $order->total_price = $order->calculateTotalPrice();
        }

        return view('pages.order.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('pages.order.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'status' => 'required|in:lunas,hutang',
            'products' => 'required|array',
            'products.*' => 'required|exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
        ]);

        $order = Order::create($request->only(['user_name', 'status', 'total_price']));

        foreach ($request->products as $index => $productId) {
            $order->products()->attach($productId, ['quantity' => $request->quantities[$index]]);
        }

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function edit(Order $order)
    {
        return view('pages.order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'status' => 'required|in:lunas,hutang',
            'total_price' => 'required|numeric',
            'products' => 'required|array',
            'products.*' => 'required|exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->only(['user_name', 'status', 'total_price']));

        $order->products()->detach();
        foreach ($request->products as $index => $productId) {
            $order->products()->attach($productId, ['quantity' => $request->quantities[$index]]);
        }

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}
