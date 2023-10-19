<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/form.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Kanit:wght@200;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    @include("shared.nav")
    <div class="container">
        <p>Sign In</p>

        <form class="form_container" action="{{ route('auth.login') }}" method="post">

        @csrf

            <label for="email"><b>Email</b></label>
            <input type="email" name="email" value="john@doe.fr" required>
            <label for="password"><b>Password</b></label>
            <div>
                <input id="password" type="password" value="password" name="password" required>
                <img class="showpassword" id="showpassword" src="{{ URL::asset('svg/showpassword.svg') }}">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

<script>
    document.getElementById("showpassword").addEventListener("click", (e) => {
        document.getElementById("password").type = document.getElementById("password").type == "password" ? "text" : "password";
    });
</script>