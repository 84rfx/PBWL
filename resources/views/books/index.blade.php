@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>📖 Daftar Buku</h2>
            <a href="{{ route('books.create') }}" class="btn btn-success">Tambah Buku</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($books->isEmpty())
            <div class="alert alert-info text-center">Belum ada buku 📭</div>
        @else
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            {{-- Cover Buku --}}
                            @if ($book->cover)
                                <img src="{{ Storage::url($book->cover) }}" class="card-img-top"
                                    style="height:250px; width:100%; object-fit:cover; border-bottom:1px solid #ddd;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                    style="height:250px; width:100%;">
                                    <span class="text-muted">Tidak ada cover</span>
                                </div>
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text"><small class="text-muted">by {{ $book->author }}</small></p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form method="POST" action="{{ route('books.destroy', $book->id) }}"
                                        onsubmit="return confirm('Yakin hapus buku ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
