@extends('admin.layout')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Event Baru</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i>
            Form Event
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Event</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal & Waktu</label>
                    <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" 
                           id="date" name="date" value="{{ old('date') }}" required>
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="expired_at" class="form-label">Tanggal & Waktu Berakhir</label>
                    <input type="datetime-local" class="form-control @error('expired_at') is-invalid @enderror" 
                           id="expired_at" name="expired_at" value="{{ old('expired_at') }}" required>
                    @error('expired_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                           id="location" name="location" value="{{ old('location') }}" required>
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="link_form_acara" class="form-label">Link Form Acara</label>
                    <input type="url" class="form-control @error('link_form_acara') is-invalid @enderror" 
                           id="link_form_acara" name="link_form_acara" value="{{ old('link_form_acara') }}" placeholder="Masukkan link Google Form/Docs">
                    <small class="text-muted">Opsional. Contoh: https://forms.gle/xxxx</small>
                    @error('link_form_acara')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="banner" class="form-label">Banner Event</label>
                    <input type="file" class="form-control @error('banner') is-invalid @enderror" 
                           id="banner" name="banner" accept="image/*" required>
                    <small class="text-muted">Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB</small>
                    @error('banner')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Event</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 