@extends('layouts.app')

@section('content')
    <h1 class="mb-4">{{ isset($book) ? 'Edit Buku' : 'Tambah Buku' }}</h1>

    <form action="{{ isset($book) ? route('books.update', $book) : route('books.store') }}" method="POST">
        @csrf
        @if(isset($book))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" 
                   value="{{ old('title', $book->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="author" name="author" 
                   value="{{ old('author', $book->author ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="publisher" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="publisher" name="publisher" 
                   value="{{ old('publisher', $book->publisher ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="year" name="year" 
                   value="{{ old('year', $book->year ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" 
                   value="{{ old('price', $book->price ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stock" name="stock" 
                   value="{{ old('stock', $book->stock ?? '') }}">
        </div>

        <button type="submit" class="btn btn-success">
            {{ isset($book) ? 'Update' : 'Simpan' }}
        </button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
