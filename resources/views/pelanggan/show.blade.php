@extends('layouts.app')

@section('content')
<h2>Detail Pelanggan</h2>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $pelanggan->nama }}</h5>
        <p class="card-text">
            <strong>Email:</strong> {{ $pelanggan->email }}<br>
            <strong>Telepon:</strong> {{ $pelanggan->telepon }}<br>
            <strong>Alamat:</strong> {{ $pelanggan->alamat }}<br>
            <strong>Kategori:</strong> {{ $pelanggan->kategori->nama_kategori }}
        </p>
        <p class="text-muted">Dibuat: {{ $pelanggan->created_at->format('d M Y H:i') }}</p>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('pelanggan.edit', $pelanggan) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection