@extends('templates.main')

@section('title', 'Vendors')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Vendors</h2>
                </div>
                <div class="pull-right mb-3">
                    <a class="btn btn-success" href="{{ route('vendors.create') }}">Buat Vendor Baru</a>
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

        @include('data.vendor-table')
    </div>
    @include('pages.vendor.delete')
@endsection
