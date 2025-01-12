<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <!-- The form action is corrected to point to the studentupdate route -->
    <form method="POST" action="{{ route('Students.studentupdate', ['student' => $student->id]) }}">
        @csrf
        @method('PUT') <!-- Use the PUT method for updates -->

        <div>
            <label for="student_id">Student ID:</label>
            <input type="hidden" name="student_id" value="0">
            <input type="checkbox" id="student_id" name="student_id" value="1" {{ $student->student_id ? 'checked' : '' }}>
        </div>

        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ $student->first_name }}" required>
        </div>

        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="{{ $student->last_name }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $student->email }}" required>
        </div>

        <div>
            <label for="address">Address:</label>
            <textarea id="address" name="address" required>{{ $student->address }}</textarea>
        </div>

        <div>
            <input type="submit" value="Update Student Info">
        </div>
    </form>

    <!-- Back Button -->
    <div style="margin-top: 20px;">
        <a href="{{ route('Students.studentindex') }}" style="display: inline-block; padding: 10px 15px; background-color: #6C757D; color: white; text-decoration: none; border-radius: 5px;">Back</a>
    </div>
</body>
</html>
