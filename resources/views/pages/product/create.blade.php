@extends('templates.main')
@section('title', 'Dashboard')
@section('content')
    <h3>Tambah Produk</h3>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Kode Barang</label>
            <input type="text" name="code" class="form-control" id="code" value="{{ old('code') }}" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" class="form-control" id="stock" value="{{ old('stock') }}" required>
        </div>
        <div class="mb-3">
            <label for="buy" class="form-label">Harga Beli</label>
            <input type="number" step="0.01" name="buy" class="form-control" id="buy"
                value="{{ old('buy') }}" required>
        </div>
        <div class="mb-3">
            <label for="sell" class="form-label">Harga Jual</label>
            <input type="number" step="0.01" name="sell" class="form-control" id="sell"
                value="{{ old('sell') }}" required>
        </div>
        <div class="mb-3">
            <label for="vendor_id" class="form-label">Vendor</label>
            <input type="number" name="vendor_id" class="form-control" id="vendor_id" value="{{ old('vendor_id') }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </form>
@endsection
