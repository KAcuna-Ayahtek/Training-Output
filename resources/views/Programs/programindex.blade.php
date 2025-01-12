<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs</title>
    <style>
        .top-left {
            position: absolute;
            top: 20px; /* Adjusted for alignment with the table */
            left: 20px;
        }

        .top-right {
            position: absolute;
            top: 20px; /* Adjusted for alignment with the table */
            right: 20px;
        }

        .button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }

        .button-secondary {
            background-color: #6C757D;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 60px; /* Adjusted to give space for the buttons */
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <!-- Home Button -->
    <div class="top-left">
        <a href="{{ url('/') }}" class="button button-secondary">Home</a>
    </div>

    <!-- Add Program Button -->
    <div class="top-right">
        <a href="{{ route('Programs.programadd') }}" class="button">Add Program</a>
    </div>

    <h1 style="text-align: center; margin-top: 50px;">Programs</h1>

    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Program Name</th>
                <th>Specialization</th>
                <th>Description</th>
                <th>Subjects</th>
                <th>Actions</th> <!-- Added Actions column -->
            </tr>
            @foreach($Programs as $program)
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
                        <!-- Edit Button -->
                        <a href="{{ route('Programs.programedit', $program->id) }}">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('Programs.programdelete', $program->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this program?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>




