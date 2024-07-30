@extends('templates.main')
@section('title', 'Edit data produk')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Produk</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="code" class="form-label">Kode Produk</label>
                    <input type="text" name="code" class="form-control" id="code"
                        value="{{ old('code', $product->code) }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" name="name" class="form-control" id="name"
                        value="{{ old('name', $product->name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" name="stock" class="form-control" id="stock"
                        value="{{ old('stock', $product->stock) }}" required>
                </div>
                <div class="mb-3">
                    <label for="buy" class="form-label">Harga Beli</label>
                    <input type="number" step="0.01" name="buy" class="form-control" id="buy"
                        value="{{ old('buy', $product->buy) }}" required>
                </div>
                <div class="mb-3">
                    <label for="sell" class="form-label">Harga Jual</label>
                    <input type="number" step="0.01" name="sell" class="form-control" id="sell"
                        value="{{ old('sell', $product->sell) }}" required>
                </div>
                <div class="mb-3">
                    <label for="vendor_id" class="form-label">Vendor</label>
                    <select name="vendor_id" id="vendor_id" class="form-control" required>
                        <option value="">Pilih Vendor</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" {{ $product->vendor_id == $vendor->id ? 'selected' : '' }}>
                                {{ $vendor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit Produk</button>
            </form>
        </div>
    </div>
@endsection
