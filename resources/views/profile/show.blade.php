@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>👤 Profil Saya</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email (tidak bisa diubah)</label>
                <input type="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Profil</label><br>
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" class="rounded mb-2"
                        style="width:100px; height:100px; object-fit:cover;">
                @else
                    <p class="text-muted">Belum ada foto</p>
                @endif
                <input type="file" name="avatar" class="form-control">
            </div>

            <button class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
