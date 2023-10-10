<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/login.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Kanit:wght@200;400&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="login_container">
        <p>Sign In</p>
        <div class="input_container">
            <label for="uname"><b>Username</b></label>
            <input type="text" name="uname" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" name="psw" required>
        </div>
        <button type="submit">Login</button>
    </div>
</body>
</html>