<!-- resources/views/errors/403.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        h1 { font-size: 48px; color: #ff0000; }
        p { font-size: 24px; }
    </style>
</head>
<body>
    <h1>403 - Access Denied</h1>
    <p>Sorry, you do not have permission to access this page.</p>
    <a href="{{ url('/') }}">Return to Home</a>
</body>
</html>
