<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        .info-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .info-container p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        .info-container ul {
            padding-left: 20px;
        }

        .info-container ul li {
            margin-bottom: 10px;
        }

        .info-container strong {
            color: #333;
        }

        .button, .enroll-button {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            cursor: pointer;
            margin-top: 20px;
        }

        .button {
            background-color: #6C757D;
        }

        .button:hover {
            background-color: #5a6268;
        }

        .enroll-button {
            background-color: #28A745;
            border: none;
        }

        .enroll-button:hover {
            background-color: #218838;
        }

        .center {
            text-align: center;
        }

        @media (max-width: 768px) {
            .info-container {
                margin: 10px;
                padding: 15px;
            }

            .info-container p, .info-container ul li {
                font-size: 14px;
            }

            .button, .enroll-button {
                font-size: 12px;
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>
    <h1>Student Details</h1>
    <div class="info-container">
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
            <div class="center">
                <form method="GET" action="{{ route('Programs.programenroll', ['student' => $student->id]) }}">
                    <button class="enroll-button">Enroll in a Program</button>
                </form>
            </div>
        @endif

        <!-- Back Button -->
        <div class="center">
            <a href="{{ route('Students.studentindex') }}" class="button">Back</a>
        </div>
    </div>
</body>
</html>




