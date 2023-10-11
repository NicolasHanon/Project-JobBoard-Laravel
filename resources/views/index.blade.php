<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <p>Salut</p>
    @foreach ($jobs as $job)
        <h4>{{ $job->title }}</h4>
    @endforeach
</body>
</html>