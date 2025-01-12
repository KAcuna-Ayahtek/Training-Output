<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Program;
class StudentController extends Controller
{
    public function studentindex(){
        $Students = student::all();
        return view('Students.studentindex', ['Students' => $Students]);
    }
    public function studentregister(){
        return view('Students.studentregister');
    }
    public function studentstore(Request $request)
{
    $data = $request->validate([
        'student_id' => 'required|boolean', 
        'first_name' => 'required|string|max:255', 
        'last_name' => 'required|string|max:255',  
        'email' => 'required|email|unique:students,email', 
        'address' => 'required|string|max:500', 
    ]); 

    $newStudent = Student::create($data);
    return redirect(route('Students.studentindex'));
}

    public function studentedit(Student $student)
{
    return view('Students.studentedit', ['student' => $student]);
}

    public function studentupdate(Student $student, Request $request)
{
    $data = $request->validate([
        'student_id' => 'required|boolean',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $student->id, // Exclude current student
        'address' => 'required|string|max:500',
    ]);

    $student->update($data);

    return redirect(route('Students.studentindex'))->with('success', 'Student info updated successfully!');
}

    public function studentdelete(Student $student)
{
    $student->delete(); 
    return redirect(route('Students.studentindex'))->with('success', 'Student info deleted successfully!');
}

public function studentshow(Student $student)
{
    $program = $student->program; // Get the program the student is enrolled in (if any)
    $programs = Program::all(); // Fetch all available programs for enrollment
    return view('Students.studentshow', [
        'student' => $student,
        'program' => $program,
        'programs' => $programs,
    ]);
}

    }

