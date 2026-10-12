@extends('layouts.app')

@section('title', 'Add Student')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/students.css') }}">
@endpush

@section('content')
    <div class="page-head"><h1>Add Student</h1></div>

    <div class="card form-card">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            @include('students._form')

            <div class="field">
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                @error('g-recaptcha-response') <small class="error">{{ $message }}</small> @enderror
            </div>

            <div class="actions">
                <button type="submit" class="btn">Save</button>
                <a href="{{ route('students.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush