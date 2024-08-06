@extends('templates.main')
@section('title', 'Orders')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Order') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('orders.update', $order->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="user_name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="user_name" name="user_name"
                                    value="{{ $order->user_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="products">Products</label>
                                <div id="products-wrapper">
                                    @foreach ($order->products as $product)
                                        <div class="product-item">
                                            <select name="products[]" class="form-control product-select" required>
                                                @foreach ($products as $productOption)
                                                    <option value="{{ $productOption->id }}"
                                                        {{ $productOption->id == $product->id ? 'selected' : '' }}>
                                                        {{ $productOption->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="number" name="quantities[]" class="form-control product-quantity"
                                                placeholder="Quantity" value="{{ $product->pivot->quantity }}" required>
                                            <button type="button" class="btn btn-danger remove-product">Remove</button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-primary mt-2" id="add-product">Add Product</button>
                            </div>

                            <div class="mb-3">
                                <label for="total_price" class="form-label">Total Harga</label>
                                <input type="number" step="0.01" class="form-control" id="total_price"
                                    name="total_price" value="{{ $order->total_price }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="lunas" {{ $order->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                    <option value="hutang" {{ $order->status == 'hutang' ? 'selected' : '' }}>Hutang
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
