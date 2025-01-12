<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
        /* Header styling */
        header {
            background-color: #007bff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        header .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .nav-buttons button {
            padding: 10px 15px;
            background-color: white;
            color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .nav-buttons button:hover {
            background-color: #0056b3;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <div>
            <h1>Ayahtek University</h1>
        </div>
        <div class="nav-buttons">
            <!-- Students Button -->
            <button onclick="window.location.href='{{ route('Students.studentindex') }}'">Students</button>

            <!-- Programs Button -->
            <button onclick="window.location.href='{{ route('Programs.programindex') }}'">Programs</button>

            <!-- ERD Button -->
            <button onclick="window.open('{{ url('DBdiagram.png') }}', '_blank')">ERD Diagram</button>
        </div>
    </header>
</body>
</html>
