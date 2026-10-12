@extends('layouts.app')

@section('title', 'Students')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/students.css') }}">
@endpush

@section('content')
    <div class="page-head">
        <h1>Students</h1>
        <a href="{{ route('students.create') }}" class="btn">Add Student</a>
    </div>

    <div class="card" id="students-table">
        <table class="table">
            <thead>
                <tr>
                    <th>Student No</th>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Email</th>
                    <th class="right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->student_no }}</td>
                        <td>{{ $student->fullname }}</td>
                        <td>{{ $student->course }}</td>
                        <td>{{ $student->email }}</td>
                        <td class="right actions">
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-outline">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST"
                                  data-delete-name="{{ $student->fullname }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="empty">No students yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/students.js') }}"></script>
@endpush