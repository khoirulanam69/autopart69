@extends('templates.auth')
@section('title', 'Login')
@section('body')
    @if (session('error'))
        <div class="alert alert-danger flash-message">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success flash-message">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header bg-primary">
            <div class="text-center text-white fw-bold">Selamat Datang di Autopart69</div>
        </div>
        <div class="card-body">
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="text-end mb-3">
                    <a href="/forgotpassword" class="text-decoration-none">Lupa password?</a>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%">Login</button>
            </form>
        </div>
    </div>
@endsection
