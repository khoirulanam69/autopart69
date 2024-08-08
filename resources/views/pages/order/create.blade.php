@extends('templates.main')
@section('title', 'Orders')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Order') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('orders.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="user_name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="user_name" name="user_name" required>
                            </div>

                            <div class="mb-2" id="products-wrapper">
                                <label class="form-label">Products</label>
                                <div class="product-item d-flex align-items-center mb-2">
                                    <select class="form-control product-select" name="products[]">
                                        <option value="">Select product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" class="form-control product-quantity mx-2" name="quantities[]"
                                        placeholder="0" style="width:10% !important;" required>
                                    <button type="button" class="btn btn-danger remove-product"><i
                                            class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary mb-3" id="add-product"><i
                                    class="fa-solid fa-plus"></i></button>

                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="lunas">Lunas</option>
                                    <option value="hutang">Hutang</option>
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
