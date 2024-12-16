<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $exception->getStatusCode() }} - {{ $exception->getMessage() ?? 'Error' }}</title>
</head>
<body>
    <h1>{{ $exception->getStatusCode() }}</h1>
    <p>{{ $exception->getMessage() ?? 'Something went wrong.' }}</p>
    <a href="{{ url('/') }}">Back to Home</a>
</body>
</html>
