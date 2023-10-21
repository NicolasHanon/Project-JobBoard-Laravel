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
        <p>Create a new user</p>
        <form class="form_container" method="post" action="{{ route('auth.register') }}">
            @csrf
            <div class="morespace">
                <input type="hidden" name="roleId" value="3">
                <input type="hidden" name="companyId" value="1">
                <div class="div_children">
                    <label for="name">Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="div_children">
                    <label for="lastname">Last name</label>
                    <input type="text" name="lastname" required>
                </div>
            </div>
            <div class="morespace">
                <div class="div_children">
                    <label for="email">Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="div_children">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" required>
                </div>
            </div class="morespace">
            <label for="more">About me</label>
            <textarea type="text" name="more" require></textarea>
            <div class="morespace">
                <div class="div_children">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                    <img class="showpassword" id="showpassword" src="{{ URL::asset('svg/showpassword.svg') }}">
                </div>
                <div class="div_children">
                    <label for="password2">Confirm password</label>
                    <input id="password2" type="password" name="password2" required>
                    <img class="showpassword" id="showpassword2" src="{{ URL::asset('svg/showpassword.svg') }}">
                </div>
            </div>
            <button type="submit">Sign up</button>
        </form>
</div>
</body>
</html>

<script>
    document.getElementById("showpassword").addEventListener("click", (e) => {
        document.getElementById("password").type = document.getElementById("password").type == "password" ? "text" : "password";
    });
    document.getElementById("showpassword2").addEventListener("click", (e) => {
        document.getElementById("password2").type = document.getElementById("password2").type == "password" ? "text" : "password";
    });

    document.querySelector("form").addEventListener("submit", (e) => {
        if (document.getElementById("password").value !== document.getElementById("password2").value) {
            e.preventDefault();
            alert("Passwords do not match. Please make sure both passwords are the same.");
        }
    });
</script>