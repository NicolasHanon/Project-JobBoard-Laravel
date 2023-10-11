<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/login.css') }}" />
    <script src="{{ asset('js/login.js')}}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Kanit:wght@200;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <form class="login_container">
        <p>Sign In</p>
        <div class="input_container">
            <label for="uname"><b>Username</b></label>
            <input type="text" name="uname" required>
            <label for="psw"><b>Password</b></label>
            <input id="password" type="password" name="psw" required>
            <label>Show Password</label>
            <input type="checkbox" onclick="viewPassword()">
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>