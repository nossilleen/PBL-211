@extends('admin.layout')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Kelola Event</h1>
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-calendar me-1"></i>
                Daftar Event
            </div>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Event
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ Str::limit($event->description, 100) }}</td>
                                <td>
                                    <a href="{{ route('admin.events.edit', $event) }}" 
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada event</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                {{ $events->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 