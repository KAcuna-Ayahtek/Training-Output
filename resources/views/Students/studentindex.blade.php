<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Students</title>
    <style>
        .top-left {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .top-right {
            position: absolute;
            top: 20px;
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

    <!-- Add Student Button -->
    <div class="top-right">
        <a href="{{ route('Students.studentregister') }}" class="button">Add Student</a>
    </div>

    <h1 style="text-align: center; margin-top: 50px;">Students</h1>

    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($Students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>
                        <a href="{{ route('Students.studentshow', ['student' => $student]) }}">Show</a>
                    </td>
                    <td>
                        <a href="{{ route('Students.studentedit', ['student' => $student]) }}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('Students.studentdelete', ['student' => $student]) }}" style="display:inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this student?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>





