<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student; // Import the Student model
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    // Display a listing of the programs
    public function programindex()
    {
        $Programs = Program::all();
        return view('Programs.programindex', compact('Programs'));
    }

    // Show the form for creating a new program
    public function create()
    {
        return view('Programs.programadd');
    }

    // Store a newly created program in storage
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'program_name' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'subjects' => 'nullable|array|max:8',
            'subjects.*' => 'nullable|string|max:255',
        ]);

        // Create a new program instance and save it to the database
        Program::create([
            'program_name' => $validatedData['program_name'],
            'specialization' => $validatedData['specialization'] ?? null,
            'description' => $validatedData['description'] ?? null,
            'subjects' => json_encode($validatedData['subjects'] ?? []),
        ]);

        // Redirect to the program index page with a success message
        return redirect()->route('Programs.programindex')->with('success', 'Program added successfully!');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('Programs.programedit', compact('program'));
    }

    // Update the specified program in storage
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'program_name' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'subjects' => 'nullable|array|max:8',
            'subjects.*' => 'nullable|string|max:255',
        ]);

        // Find the program and update its details
        $program = Program::findOrFail($id);
        $program->update([
            'program_name' => $validatedData['program_name'],
            'specialization' => $validatedData['specialization'] ?? null,
            'description' => $validatedData['description'] ?? null,
            'subjects' => json_encode($validatedData['subjects'] ?? []),
        ]);

        // Redirect to the program index page with a success message
        return redirect()->route('Programs.programindex')->with('success', 'Program updated successfully!');
    }

    // Remove the specified program from storage
    public function destroy($id)
    {
        // Find the program and delete it
        $program = Program::findOrFail($id);
        $program->delete();

        // Redirect to the program index page with a success message
        return redirect()->route('Programs.programindex')->with('success', 'Program deleted successfully!');
    }

    // Enroll a student in a program
    public function enroll(Request $request, $studentId, $programId)
    {
        $student = Student::findOrFail($studentId);
        $program = Program::findOrFail($programId);

        // Update the student's program_id
        $student->program_id = $program->id;
        $student->save();

        return redirect()->route('Students.studentshow', ['student' => $student->id])
            ->with('success', "Student has been successfully enrolled in {$program->program_name}.");
    }

    // Show available programs for a specific student
    public function showAvailablePrograms($studentId)
    {
        $student = Student::findOrFail($studentId); // Fetch the student
        $programs = Program::all(); // Fetch all available programs

        return view('Programs.programenroll', compact('student', 'programs'));
    }
}



