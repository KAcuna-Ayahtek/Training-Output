<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .form-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-container textarea {
            resize: vertical;
            height: 100px;
        }

        .form-container .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-container .checkbox-container label {
            margin-left: 10px;
        }

        .form-container input[type="submit"],
        .form-container a {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
        }

        .form-container input[type="submit"]:hover,
        .form-container a:hover {
            background-color: #0056b3;
        }

        .error-messages ul {
            padding: 10px;
            border: 1px solid #e74c3c;
            background-color: #f9d6d5;
            color: #e74c3c;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 10px;
                padding: 15px;
            }

            .form-container input,
            .form-container textarea {
                font-size: 14px;
            }

            .form-container input[type="submit"],
            .form-container a {
                font-size: 14px;
                padding: 8px 12px;
            }
        }
    </style>
</head>
<body>
    <h1>Register Student</h1>
    <div class="form-container">
        <!-- Display errors -->
        @if($errors->any())
        <div class="error-messages">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ route('Students.studentstore') }}">
            @csrf
            @method('post')

            <div class="checkbox-container">
                <input type="hidden" name="student_id" value="0">
                <input type="checkbox" id="student_id" name="student_id" value="1">
                <label for="student_id">Student ID</label>
            </div>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <input type="submit" value="Register A New Student">
        </form>

        <!-- Back Button -->
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('Students.studentindex') }}">Back</a>
        </div>
    </div>
</body>
</html>

