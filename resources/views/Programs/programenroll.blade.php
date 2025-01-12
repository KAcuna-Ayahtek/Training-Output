<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll in a Program</title>
</head>
<body>
    <h1>Available Programs</h1>
    <div>
        @if(session()->has('success'))
        <div>
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Program Name</th>
                <th>Specialization</th>
                <th>Description</th>
                <th>Subjects</th>
                <th>Actions</th> <!-- Enroll button -->
            </tr>
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
        </table>
    </div>
</body>
</html>
