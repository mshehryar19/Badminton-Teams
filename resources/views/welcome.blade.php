<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Badminton Teams Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 100px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
        }
        p {
            color: #555;
            font-size: 16px;
        }
        .links a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            background: #3490dc;
            color: #fff;
            border-radius: 4px;
        }
        .links a:hover {
            background: #2779bd;
        }
        footer {
            margin-top: 30px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🏸 Welcome to Badminton Teams Manager</h1>

    <p>
        A simple Laravel application to manage badminton teams, players, and coaches.
        Built with Laravel, Docker, MySQL, and Nginx.
    </p>

    <div class="links">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>

    <footer>
        Version 1.0 • Built by Shehryar
    </footer>
</div>

</body>
</html>
