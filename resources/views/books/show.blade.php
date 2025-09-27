@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="row g-0">
                {{-- Cover Buku --}}
                <div class="col-md-4">
                    @if ($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}" class="img-fluid rounded-start"
                            alt="{{ $book->title }}">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light"
                            style="height:100%; min-height:300px;">
                            <span class="text-muted">Tidak ada cover</span>
                        </div>
                    @endif
                </div>

                {{-- Detail Buku --}}
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title">{{ $book->title }}</h3>
                        <p class="card-text"><strong>Penulis:</strong> {{ $book->author }}</p>
                        @if ($book->publisher)
                            <p class="card-text"><strong>Penerbit:</strong> {{ $book->publisher }}</p>
                        @endif
                        @if ($book->year)
                            <p class="card-text"><strong>Tahun:</strong> {{ $book->year }}</p>
                        @endif
                        @if ($book->price)
                            <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($book->price, 0, ',', '.') }}
                            </p>
                        @endif
                        @if ($book->stock !== null)
                            <p class="card-text"><strong>Stok:</strong> {{ $book->stock }}</p>
                        @endif

                        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">⬅️ Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
