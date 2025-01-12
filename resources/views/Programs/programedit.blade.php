<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program</title>
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

        .form-container .subjects-container {
            margin-bottom: 15px;
        }

        .form-container .subjects-container label {
            font-weight: normal;
        }

        .form-container .button-group {
            display: flex;
            justify-content: space-between;
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
            text-align: center;
            font-size: 16px;
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
    </style>
</head>
<body>
    <h1>Edit Program</h1>
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

        <form method="post" action="{{ route('Programs.programupdate', $program->id) }}">
            @csrf
            @method('put')

            <label for="program_name">Program Name:</label>
            <input type="text" id="program_name" name="program_name" value="{{ old('program_name', $program->program_name) }}" placeholder="Enter the program name" required>

            <label for="specialization">Specialization:</label>
            <input type="text" id="specialization" name="specialization" value="{{ old('specialization', $program->specialization) }}" placeholder="Enter specialization (optional)">

            <label for="description">Description:</label>
            <textarea id="description" name="description" placeholder="Enter a brief description">{{ old('description', $program->description) }}</textarea>

            <label>Subjects:</label>
            <div class="subjects-container">
                @php
                    $subjects = old('subjects', json_decode($program->subjects, true) ?? []);
                @endphp
                @for($i = 0; $i < 8; $i++)
                    <label for="subjects[{{ $i }}]">Subject {{ $i + 1 }}:</label>
                    <input type="text" id="subjects[{{ $i }}]" name="subjects[]" value="{{ $subjects[$i] ?? '' }}" placeholder="Enter subject {{ $i + 1 }}">
                @endfor
            </div>

            <div class="button-group">
                <input type="submit" value="Update Program">
                <a href="{{ route('Programs.programindex') }}">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>


