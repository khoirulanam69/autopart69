<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.product');
    }

    public function getProducts()
    {
        $products = Product::all();
        return DataTables::of($products)
            ->addColumn('action', function ($product) {
                return '<td>
                    <a href="/product/edit/' . $product->id . '"><i class="fa-solid fa-pen-to-square mx-1" style="color: orange"></i></a>
                    <a href="/product/delete/' . $product->id . '"><i class="fa-solid fa-trash mx-1" style="color: red"></i></a>
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
}
