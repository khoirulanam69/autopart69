@extends('templates.main')
@section('title', 'Produk')
@section('content')
    <h3 class="mb-4">Data Produk</h3>
    @if (session('success'))
        <div class="alert alert-success flash-message">
            {{ session('success') }}
        </div>
    @endif
    <a href="/product/create" class="btn btn-primary my-2">Tambah Data</a>
    @include('data.product-table')
    @include('pages.product.delete')
@endsection
