<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.product.index');
    }

    public function getProducts()
    {
        $products = Product::all();
        return DataTables::of($products)
            ->addColumn('action', function ($product) {
                return '<td>
                    <a href="/product/edit/' . $product->id . '"><i class="fa-solid fa-pen-to-square mx-1" style="color: orange"></i></a>
                    <a href="/product/" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . $product->id . '"><i class="fa-solid fa-trash mx-1" style="color: red"></i></a>
                    <a href="/product/print/' . $product->id . '"><i class="fa-solid fa-print mx-1" style="color: blue"></i></a>
                </td>';
            })
            ->editColumn('updated_at', function ($product) {
                return $product->updated_at->format('Y-m-d');
            })
            ->addColumn('vendor', function ($product) {
                return $product->vendor ? $product->vendor->name : 'N/A';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $vendors = Vendor::all();
        return view('pages.product.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'buy' => 'required|integer|min:0',
            'sell' => 'required|integer|min:0',
            'vendor_id' => 'required|integer|exists:vendors,id',
        ]);

        Product::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'stock' => $request->input('stock'),
            'buy' => $request->input('buy'),
            'sell' => $request->input('sell'),
            'vendor_id' => $request->input('vendor_id'),
        ]);

        return redirect()->route('products')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $vendors = Vendor::all();
        return view('pages.product.edit', compact('product', 'vendors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'buy' => 'required|integer|min:0',
            'sell' => 'required|integer|min:0',
            'vendor_id' => 'required|integer|exists:vendors,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'stock' => $request->input('stock'),
            'buy' => $request->input('buy'),
            'sell' => $request->input('sell'),
            'vendor_id' => $request->input('vendor_id'),
        ]);

        return redirect()->route('products')->with('success', 'Produk berhasil diupdate');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products')->with('success', 'Produk berhasil dihapus');
    }
}
