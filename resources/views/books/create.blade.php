@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>➕ Tambah Buku</h2>

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Penulis</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="file" name="cover" id="cover" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
