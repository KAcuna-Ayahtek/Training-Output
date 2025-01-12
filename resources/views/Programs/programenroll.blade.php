<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll in a Program</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .success-message {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #28a745;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        ul {
            padding-left: 20px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            table, table th, table td {
                font-size: 14px;
            }

            button {
                font-size: 12px;
                padding: 6px 10px;
            }
        }
    </style>
</head>
<body>
    <h1>Available Programs</h1>
    <div class="container">
        <!-- Success Message -->
        @if(session()->has('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif

        <!-- Programs Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Program Name</th>
                    <th>Specialization</th>
                    <th>Description</th>
                    <th>Subjects</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                <tr>
                    <td>{{ $program->id }}</td>
                    <td>{{ $program->program_name }}</td>
                    <td>{{ $program->specialization }}</td>
                    <td>{{ $program->description }}</td>
                    <td>
                        <ul>
                            @foreach(json_decode($program->subjects, true) as $subject)
                                <li>{{ $subject }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <!-- Enroll Button -->
                        <form method="POST" action="{{ route('Programs.enroll', ['student' => $student->id, 'program' => $program->id]) }}" style="display:inline;">
                            @csrf
                            <button type="submit">Enroll</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

