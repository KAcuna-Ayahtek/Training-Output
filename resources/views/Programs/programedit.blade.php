<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program</title>
</head>
<body>
    <h1>Edit Program</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{ route('Programs.programupdate', $program->id) }}">
        @csrf
        @method('put')

        <div>
            <label for="program_name">Program Name:</label>
            <input type="text" id="program_name" name="program_name" value="{{ old('program_name', $program->program_name) }}" required>
        </div>

        <div>
            <label for="specialization">Specialization:</label>
            <input type="text" id="specialization" name="specialization" value="{{ old('specialization', $program->specialization) }}">
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description', $program->description) }}</textarea>
        </div>

        <div>
            <label>Subjects:</label>
            @php
                $subjects = old('subjects', json_decode($program->subjects, true) ?? []);
            @endphp
            @for($i = 0; $i < 8; $i++)
                <div>
                    <label for="subjects[{{ $i }}]">Subject {{ $i + 1 }}:</label>
                    <input type="text" id="subjects[{{ $i }}]" name="subjects[]" value="{{ $subjects[$i] ?? '' }}">
                </div>
            @endfor
        </div>

        <div>
            <input type="submit" value="Update Program">
        </div>
    </form>

    <!-- Cancel Button -->
    <div style="margin-top: 20px;">
        <a href="{{ route('Programs.programindex') }}" style="display: inline-block; padding: 10px 15px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 5px;">Cancel</a>
    </div>
</body>
</html>

