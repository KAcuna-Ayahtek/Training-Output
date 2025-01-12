<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #007bff;
            color: white;
        }

        .top-bar a {
            text-decoration: none;
            padding: 10px 15px;
            color: white;
            background-color: #6c757d;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .top-bar a:hover {
            background-color: #0056b3;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

        .actions a, .actions button {
            text-decoration: none;
            padding: 5px 10px;
            margin-right: 5px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .actions a:hover, .actions button:hover {
            background-color: #0056b3;
        }

        .actions button:hover {
            background-color: #e74c3c;
        }

        @media (max-width: 768px) {
            table, table th, table td {
                font-size: 14px;
            }

            .top-bar a {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Top Navigation Bar -->
    <div class="top-bar">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('Students.studentregister') }}">Add Student</a>
    </div>

    <h1>Students</h1>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Enrollment Status</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>
                        @if($student->program)
                            <span style="color: green;">Enrolled</span>
                        @else
                            <span style="color: red;">Not Enrolled</span>
                        @endif
                    </td>
                    <td class="actions">
                        <a href="{{ route('Students.studentshow', ['student' => $student]) }}">Show</a>
                    </td>
                    <td class="actions">
                        <a href="{{ route('Students.studentedit', ['student' => $student]) }}">Edit</a>
                    </td>
                    <td class="actions">
                        <form method="POST" action="{{ route('Students.studentdelete', ['student' => $student]) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this student?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>







