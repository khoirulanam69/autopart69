@extends('templates.auth')
@section('title', 'Buat Password Baru')
@section('body')
    <div class="card">
        <div class="card-header bg-primary">
            <div class="text-center text-white fw-bold">Masukkan Password Baru</div>
        </div>
        <div class="card-body">
            <form action="/newpassword" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="repassword" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="repassword" name="repassword" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%">Submit</button>
            </form>
        </div>
    </div>
@endsection
