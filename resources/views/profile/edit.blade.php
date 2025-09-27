@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profil</h2>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
            @if ($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" class="mt-2 rounded" style="height:80px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
