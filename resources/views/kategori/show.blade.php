@extends('layouts.app')

@section('content')
<h2>Detail Kategori</h2>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $kategori->nama_kategori }}</h5>
        <p class="card-text">{{ $kategori->deskripsi }}</p>
        <p class="text-muted">Dibuat: {{ $kategori->created_at->format('d M Y H:i') }}</p>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('kategori.edit', $kategori) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection