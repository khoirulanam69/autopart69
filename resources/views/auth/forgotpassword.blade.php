@extends('templates.auth')
@section('title', 'Lupa Password')
@section('body')
    @if (session('success'))
        <div class="alert alert-success flash-message">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header bg-primary">
            <div class="text-center text-white fw-bold">Lupa Password</div>
        </div>
        <div class="card-body">
            <form action="/forgotpassword" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%">Kirim</button>
            </form>
        </div>
    </div>
@endsection
