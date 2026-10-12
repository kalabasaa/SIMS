@extends('layouts.app')

@section('title', 'Edit Student')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/students.css') }}">
@endpush

@section('content')
    <div class="page-head"><h1>Edit Student</h1></div>

    <div class="card form-card">
        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            @include('students._form')

            <div class="actions">
                <button type="submit" class="btn">Update</button>
                <a href="{{ route('students.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection