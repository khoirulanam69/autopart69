@extends('templates.main')
@section('title', 'Edit data produk')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Product</h4>
        </div>
        <div class="card-body">
            <!-- Display Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form to Edit Product -->
            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" name="code" class="form-control" id="code"
                        value="{{ old('code', $product->code) }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name"
                        value="{{ old('name', $product->name) }}" required>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" id="stock"
                        value="{{ old('stock', $product->stock) }}" required>
                </div>
                <div class="mb-3">
                    <label for="buy" class="form-label">Buy Price</label>
                    <input type="number" step="0.01" name="buy" class="form-control" id="buy"
                        value="{{ old('buy', $product->buy) }}" required>
                </div>
                <div class="mb-3">
                    <label for="sell" class="form-label">Sell Price</label>
                    <input type="number" step="0.01" name="sell" class="form-control" id="sell"
                        value="{{ old('sell', $product->sell) }}" required>
                </div>
                <div class="mb-3">
                    <label for="vendor_id" class="form-label">Vendor</label>
                    <select name="vendor_id" id="vendor_id" class="form-control" required>
                        <option value="">Select a Vendor</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" {{ $product->vendor_id == $vendor->id ? 'selected' : '' }}>
                                {{ $vendor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
@endsection
