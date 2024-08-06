@extends('templates.main')

@section('title', 'Orders')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Orders</h2>
                </div>
                <div class="pull-right mb-3">
                    <a class="btn btn-success" href="{{ route('orders.create') }}">Buat Order Baru</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success flash-message">
                {{ $message }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Produk</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->user_name }}</td>
                        <td>
                            @foreach ($order->products as $product)
                                <div>{{ $product->name }} (Quantity: {{ $product->pivot->quantity }})</div>
                            @endforeach
                        </td>
                        <td>{{ number_format($order->total_price, 2) }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                id="deleteForm{{ $order->id }}">
                                <a href="{{ route('orders.edit', $order->id) }}">
                                    <i class="fa-solid fa-pen-to-square mx-1" style="color: orange"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="button" style="border: 0; background: transparent;" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-id="{{ $order->id }}">
                                    <i class="fa-solid fa-trash mx-1" style="color: red"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('pages.order.delete')
@endsection
