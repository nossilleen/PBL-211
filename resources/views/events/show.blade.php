@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{ $event->title }}</h1>
                    <div class="card-text">
                        {!! nl2br(e($event->description)) !!}
                    </div>
                    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Event
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 