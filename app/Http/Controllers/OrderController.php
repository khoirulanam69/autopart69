<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        return view('pages.order.index');
    }

    public function getOrders()
    {
        $orders = Order::with('products')->select('orders.*');

        return DataTables::of($orders)
            ->addColumn('products', function ($order) {
                return $order->products->map(function ($product) {
                    return $product->name . ' x ' . $product->pivot->quantity;
                })->implode('<br>');
            })
            ->addColumn('total_price', function ($order) {
                return $order->getTotalPrice();
            })
            ->addColumn('action', function ($order) {
                return '<td>
                            <a href="' . route('orders.edit', $order->id) . '">
                                <i class="fa-solid fa-pen-to-square mx-1" style="color: orange"></i>
                            </a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . $order->id . '">
                                <i class="fa-solid fa-trash mx-1" style="color: red"></i>
                            </a>
                        </td>';
            })
            ->rawColumns(['products', 'action'])
            ->make(true);
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

        $order->total_price = $order->getTotalPrice();
        $order->save();

        return redirect()->route('orders.index')
            ->with('success', 'Order berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $order = Order::with('products')->findOrFail($id);
        $products = Product::all();
        return view('pages.order.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'status' => 'required|in:lunas,hutang',
            'products' => 'required|array',
            'quantities' => 'required|array',
            'products.*' => 'exists:products,id',
            'quantities.*' => 'integer|min:1',
        ]);

        $order->user_name = $request->user_name;
        $order->status = $request->status;
        $order->save();

        $syncData = [];
        foreach ($request->products as $index => $productId) {
            $syncData[$productId] = ['quantity' => $request->quantities[$index]];
        }

        $order->products()->sync($syncData);

        $order->total_price = $order->getTotalPrice();
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order berhasil diperbaharui.');
    }

    public function destroy(Order $order)
    {
        $order->products()->detach();
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus');
    }
}
