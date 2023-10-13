<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/signup.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Kanit:wght@200;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <p>Create a new user</p>
        <form class="form_container">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" required>
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" required>
                <label for="phone">Phone</label>
                <input type="tel" name="phone" required>
            </div>
            <label for="about">About me</label>
            <textarea name="about"></textarea>
            <button type="submit">Sign up</button>
        </form>
</div>
</body>
</html>

<!-- <script src="{{ asset('js/form.js')}}"></script> -->