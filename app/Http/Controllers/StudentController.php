<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    public function index(Request $request)
    {
    $sorts = [
        'oldest' => ['id', 'asc'],
        'newest' => ['id', 'desc'],
        'name_asc' => ['fullname', 'asc'],
        'name_desc' => ['fullname', 'desc'],
        'student_no' => ['student_no', 'asc'],
    ];

    $sort = array_key_exists($request->sort, $sorts) ? $request->sort : 'oldest';
    [$column, $direction] = $sorts[$sort];

    $students = Student::orderBy($column, $direction)->get();

    return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_no' => ['required', 'string', 'max:20', 'unique:students,student_no'],
            'fullname' => ['required', 'string', 'max:255'],
            'course' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'g-recaptcha-response' => ['required', function ($attribute, $value, $fail) {
                $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => config('services.recaptcha.secret_key'),
                    'response' => $value,
                    'remoteip' => request()->ip(),
                ]);

                if (! $response->json('success')) {
                    $fail('reCAPTCHA verification failed. Please try again.');
                }
            }],
        ], [
            'g-recaptcha-response.required' => 'Please check the reCAPTCHA box.',
        ]);

        Student::create(collect($data)->except('g-recaptcha-response')->all());

        return redirect()->route('students.index')->with('success', 'Student added.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'student_no' => ['required', 'string', 'max:20', 'unique:students,student_no,' . $student->id],
            'fullname' => ['required', 'string', 'max:255'],
            'course' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email,' . $student->id],
        ]);

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}