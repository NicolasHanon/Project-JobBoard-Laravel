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
        <p>Manage my profile</p>
        <form class="form_container">
            <div class="morespace">
                <div class="container_children">
                    <label for="name">Name is</label>
                    <input type="text" name="name" required>
                </div>
                <div class="container_children">
                    <label for="lastname">Last name is</label>
                    <input type="text" name="lastname" required>
                </div>
            </div>
            <div class="morespace">
                <div class="container_children">
                    <label for="email">Email is</label>
                    <input type="email" name="email" required>
                </div>
                <div class="container_children">
                    <label for="phone">Phone is</label>
                    <input type="tel" name="phone" required>
                </div>
            </div>
            <label for="about">About me</label>
            <textarea name="about"></textarea>
            <div class="morespace">
                <div class="container_children">
                    <label for="oldpassword">Previous password</label>
                    <input id="password" type="password" name="oldpassword" required>
                    <img class="showpassword" id="showpassword" src="{{ URL::asset('svg/showpassword.svg') }}">
                </div>
                <div class="container_children">
                    <label for="newpassword">New password</label>
                    <input id="password2" type="password" name="newpassword" required>
                    <img class="showpassword" id="showpassword2" src="{{ URL::asset('svg/showpassword.svg') }}">
                </div>
            </div>
            <button type="submit">Save changes</button>
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
</script>

<script src="{{ asset('js/form.js')}}"></script>