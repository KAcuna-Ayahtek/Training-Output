<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Student</title>
</head>
<body>
    <h1>Register Student</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{ route('Students.studentstore') }}">
        @csrf
        @method('post')

        <div>
            <label for="student_id">Student ID:</label>
            <input type="hidden" name="student_id" value="0">
            <input type="checkbox" id="student_id" name="student_id" value="1"> 
        </div>

        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>

        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>
        </div>

        <div>
            <input type="submit" value="Register A New Student">
        </div>
    </form>

    <!-- Back Button -->
    <div style="margin-top: 20px;">
        <a href="{{ route('Students.studentindex') }}" style="display: inline-block; padding: 10px 15px; background-color: #6C757D; color: white; text-decoration: none; border-radius: 5px;">Back</a>
    </div>
</body>
</html>
