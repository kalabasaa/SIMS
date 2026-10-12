<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Students') | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    @stack('styles')
</head>
<body>
    @php
        $sorts = [
            'oldest' => 'Oldest first',
            'newest' => 'Newest first',
            'name_asc' => 'Name A-Z',
            'name_desc' => 'Name Z-A',
            'student_no' => 'Student No',
        ];
        $currentSort = request('sort', 'oldest');
    @endphp

    <nav class="nav">
        <div class="nav-inner">
            <a href="{{ route('students.index') }}" class="brand">SIMS</a>

            <div class="nav-links">
                <div class="dropdown">
                    <button type="button" class="dropdown-toggle {{ request()->routeIs('students.index') ? 'active' : '' }}" id="viewAllToggle">
                        View All &#9662;
                    </button>
                    <div class="dropdown-menu" id="viewAllMenu">
                        @foreach ($sorts as $key => $label)
                            <a href="{{ route('students.index', ['sort' => $key]) }}"
                               class="{{ request()->routeIs('students.index') && $currentSort === $key ? 'current' : '' }}">
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('students.index') }}#students-table"
                   class="{{ request()->routeIs('students.edit') ? 'active' : '' }}">Edit / Delete</a>

                <a href="{{ route('students.create') }}"
                   class="{{ request()->routeIs('students.create') ? 'active' : '' }}">Add Student</a>
            </div>
        </div>
    </nav>

    <main class="container">
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        &copy; {{ date('Y') }} SIMS &middot; Student Information Management System
    </footer>

    <div class="modal" id="deleteModal" hidden>
        <div class="modal-box">
            <h3>Delete student?</h3>
            <p id="deleteModalText"></p>
            <div class="modal-actions">
                <button type="button" class="btn btn-outline" id="deleteCancel">Cancel</button>
                <button type="button" class="btn" id="deleteConfirm">Delete</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>