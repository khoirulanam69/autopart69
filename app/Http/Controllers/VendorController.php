<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use Yajra\DataTables\Facades\DataTables;

class VendorController extends Controller
{
    public function index()
    {
        return view('pages.vendor.index');
    }

    public function create()
    {
        return view('pages.vendor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'unique:vendors,email',
        ]);

        Vendor::create($request->all());

        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully.');
    }

    public function edit(Vendor $vendor)
    {
        return view('pages.vendor.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'unique:vendors,email,' . $vendor->id,
        ]);

        $vendor->update($request->all());

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully.');
    }

    public function destroy(Vendor $vendor)
    {
        if ($vendor->products()->count() > 0) {
            return redirect()->route('vendors.index')
                ->with('error', 'Vendor tidak bisa dihapus karena masih memiliki produk terkait.');
        }

        $vendor->delete();

        return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully.');
    }

    public function getVendors()
    {
        $vendors = Vendor::select('vendors.*');

        return DataTables::of($vendors)
            ->addColumn('action', function ($vendor) {
                return '<td>
                        <a href="' . route('vendors.edit', $vendor->id) . '">
                            <i class="fa-solid fa-pen-to-square mx-1" style="color: orange"></i>
                        </a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteVendorModal" data-id="' . $vendor->id . '">
                            <i class="fa-solid fa-trash mx-1" style="color: red"></i>
                        </a>
                    </td>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
