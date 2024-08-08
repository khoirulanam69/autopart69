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

                            <div class="mb-2" id="products-wrapper">
                                <label class="form-label">Products</label>
                                @foreach ($order->products as $product)
                                    <div class="product-item d-flex align-items-center mb-2">
                                        <select class="form-control product-select" name="products[]">
                                            <option value="">Select product</option>
                                            @foreach ($products as $productOption)
                                                <option value="{{ $productOption->id }}"
                                                    {{ $productOption->id == $product->id ? 'selected' : '' }}>
                                                    {{ $productOption->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="number" name="quantities[]" min="1"
                                            class="form-control product-quantity mx-2" placeholder="0"
                                            value="{{ $product->pivot->quantity }}" style="width:10% !important;" required>
                                        <button type="button" class="btn btn-danger remove-product"><i
                                                class="fa-solid fa-xmark"></i></button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-secondary mb-3" id="add-product"><i
                                    class="fa-solid fa-plus"></i></button>

                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="lunas" {{ $order->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                    <option value="hutang" {{ $order->status == 'hutang' ? 'selected' : '' }}>Hutang
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
