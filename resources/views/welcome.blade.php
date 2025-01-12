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
            color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background: rgba(0, 123, 255, 0.9); 
            padding: 15px 20px;
            text-align: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .header a {
            text-decoration: none;
            color: white;
            margin: 0 20px;
            font-size: 1.2rem;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .header a:hover {
            color: #ffdd57;
        }

        .container {
            position: relative;
            text-align: center;
            top: 15vh; /* Moved even higher */
            transform: translateY(0); /* No offset to simplify positioning */
        }

        .text-box {
            display: inline-block;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 600px;
        }

        h1 {
            font-size: 3rem;
            margin: 0;
            color: #007bff;
        }

        p {
            font-size: 1.25rem;
            margin: 10px 0 0;
            color: #555;
        }

        .footer {
            position: fixed;
            bottom: 10px;
            right: 15px;
            font-size: 0.9rem;
            color: #888;
        }

        @media (max-width: 768px) {
            .header a {
                font-size: 1rem;
                margin: 0 10px;
            }

            h1 {
                font-size: 2.5rem;
            }

            p {
                font-size: 1rem;
            }

            .text-box {
                padding: 15px 30px;
            }

            .footer {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <a href="/student">Students</a>
        <a href="/programs">Programs</a>
        <a href="/diagram.png.png" target="_blank">ERD Diagram</a>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="text-box">
            <h1>Ayahtek University</h1>
            <p>Simplifying Digital Solutions</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        © 2025 Ayahtek University. All rights reserved.
    </div>
</body>
</html>












