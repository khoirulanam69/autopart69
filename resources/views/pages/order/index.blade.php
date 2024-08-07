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
        @if ($message = Session::get('error'))
            <div class="alert alert-danger flash-message">
                {{ $message }}
            </div>
        @endif

        @include('data.order-table')
    </div>

    @include('pages.order.delete')
@endsection
