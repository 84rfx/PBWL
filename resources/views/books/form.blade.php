@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($book) ? 'Edit Buku' : 'Tambah Buku' }}</h1>

    <form action="{{ isset($book) ? route('books.update', $book->id) : route('books.store') }}" method="POST">
        @csrf
        @if(isset($book))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $book->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Penulis</label>
            <input type="text" name="author" class="form-control"
                   value="{{ old('author', $book->author ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Penerbit</label>
            <input type="text" name="publisher" class="form-control"
                   value="{{ old('publisher', $book->publisher ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="year" class="form-control"
                   value="{{ old('year', $book->year ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" step="0.01" name="price" class="form-control"
                   value="{{ old('price', $book->price ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stock" class="form-control"
                   value="{{ old('stock', $book->stock ?? '') }}">
        </div>

        <button type="submit" class="btn btn-success">
            {{ isset($book) ? 'Update' : 'Simpan' }}
        </button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
