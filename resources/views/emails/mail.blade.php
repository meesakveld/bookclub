<!DOCTYPE html>
<html>
<head>
    <title>Test email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>{{ $data['title'] }}</h1>
    <p>{{ $data['body'] }}</p>
</body>
</html>