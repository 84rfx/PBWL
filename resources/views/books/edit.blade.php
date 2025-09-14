@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>

    {{-- Panggil ulang form, passing data $book --}}
    @include('books.form', ['book' => $book])
</div>
@endsection
