@php($student = $student ?? null)

<div class="field">
    <label for="student_no">Student No</label>
    <input type="text" id="student_no" name="student_no" value="{{ old('student_no', $student?->student_no) }}">
    @error('student_no') <small class="error">{{ $message }}</small> @enderror
</div>

<div class="field">
    <label for="fullname">Full Name</label>
    <input type="text" id="fullname" name="fullname" value="{{ old('fullname', $student?->fullname) }}">
    @error('fullname') <small class="error">{{ $message }}</small> @enderror
</div>

<div class="field">
    <label for="course">Course</label>
    <input type="text" id="course" name="course" value="{{ old('course', $student?->course) }}">
    @error('course') <small class="error">{{ $message }}</small> @enderror
</div>

<div class="field">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email', $student?->email) }}">
    @error('email') <small class="error">{{ $message }}</small> @enderror
</div>