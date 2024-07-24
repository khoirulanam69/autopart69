@extends('templates.main')
@section('title', 'Dashboard')
@section('content')
    <h3 class="mb-4">Data Produk</h3>
    @include('data.data-table')
@endsection
