<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Student Info</title>
    <style>
        .button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 14px;
        }

        .button-secondary {
            background-color: #6C757D;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button-secondary:hover {
            background-color: #5a6268;
        }

        .enroll-button {
            padding: 10px 15px;
            background-color: #28A745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .enroll-button:hover {
            background-color: #218838;
        }

        ul {
            padding-left: 20px;
        }

        p, h1, h2 {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Student Details</h1>
    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>First Name:</strong> {{ $student->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $student->last_name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Address:</strong> {{ $student->address }}</p>

    <h2>Program Enrollment</h2>
    @if($program)
        <p>The student is currently enrolled in:</p>
        <ul>
            <li><strong>Program Name:</strong> {{ $program->program_name }}</li>
            <li><strong>Specialization:</strong> {{ $program->specialization }}</li>
            <li><strong>Description:</strong> {{ $program->description }}</li>
        </ul>
    @else
        <p>The student is not currently enrolled in any program.</p>
        <form method="GET" action="{{ route('Programs.programenroll', ['student' => $student->id]) }}" style="margin-top: 10px;">
            <button class="enroll-button">Enroll in a Program</button>
        </form>
    @endif

    <!-- Back Button -->
    <a href="{{ route('Students.studentindex') }}" class="button button-secondary">Back</a>
</body>
</html>



