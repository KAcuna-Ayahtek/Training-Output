<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayahtek University</title>
    <style>
        body {
            background: linear-gradient(rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.2)), 
                        url('/Ayahtek.png') no-repeat center center fixed;
            background-size: cover;
            color: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background: rgba(255, 255, 255, 0.8);
            padding: 10px 20px;
            text-align: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .header a {
            text-decoration: none;
            color: black;
            margin: 0 15px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .container {
            text-align: center;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            font-size: 3.5rem;
            margin: 0;
            padding: 0;
            line-height: 1.2;
        }

        p {
            font-size: 1.25rem;
            margin: 0;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Include Header Component -->
    <x-header />

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
