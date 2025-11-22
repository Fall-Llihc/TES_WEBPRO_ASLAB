@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 style="color:white;">Buat TP Baru</h1>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">← Kembali ke Home</a>
    </div>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

         <div class="mb-3">
            <label for="Judul" class="form-label" style="color:white">Judul</label>
            <input
                type="text"
                name="Judul"
                id="Judul"
                class="form-control @error('Judul') is-invalid @enderror"
                value="{{ old('Judul') }}"
                required
            >
            @error('Judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Sub_Judul" class="form-label" style="color:white">Sub Judul</label>
            <input
                type="text"
                name="Sub_Judul"
                id="Sub_Judul"
                class="form-control @error('Sub_Judul') is-invalid @enderror"
                value="{{ old('Sub_Judul') }}"
                required
            >
            @error('Sub_Judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="Kategori" class="form-label" style="color:white">Kategori</label>
            <input
                type="text"
                name="Kategori"
                id="Kategori"
                class="form-control @error('Kategori') is-invalid @enderror"
                value="{{ old('Kategori') }}"
                required
            >
            @error('Kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Deadline" class="form-label" style="color:white">Deadline</label>
            <input
                type="date"
                name="Deadline"
                id="Deadline"
                class="form-control @error('Deadline') is-invalid @enderror"
                value="{{ old('Deadline') }}"
                required
            >
            @error('Deadline')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Deskripsi" class="form-label" style="color:white">Deskripsi</label>
            <input
                type="text"
                name="Deskripsi"
                id="Deskripsi"
                class="form-control @error('Deskripsi') is-invalid @enderror"
                value="{{ old('Deskripsi') }}"
                required
            >
            @error('Deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="color:white">Buat TP</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection