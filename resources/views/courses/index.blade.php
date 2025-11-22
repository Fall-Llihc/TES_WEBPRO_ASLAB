@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 style="color:white;">📚 SEMUA TP</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-success">Buat TP Baru</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @forelse ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $course->Judul }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $course->Sub_Judul }}</h6>
                        <p class="card-text flex-grow-1">{{ Str::limit($course->Deskripsi, 100) }}</p>
                        
                        <div class="mt-3">
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                            
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')   
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete the course: {{ $course->title }}?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Tanggal Post: {{ $course->created_at->isoFormat('dddd, D MMMM Y') }}
                    </div>
                    <div class="card-footer text-muted">
                        Deadline: {{ Carbon\Carbon::parse($course->Deadline)->isoFormat('dddd, D MMMM Y')}}
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Belum ada TP yang dibuat. <a href="{{ route('courses.create') }}">buat TP!</a>
                </div>
            </div>
        @endforelse
    </div>
@endsection