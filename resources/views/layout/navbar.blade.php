<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="nav">
        <p>JobBoard</p>
        <img class="menu" onClick="showNav()" src="{{ URL::asset('svg/menu.svg') }}">
        <nav class="burger-drill">
            <div>
                <img class="option" src="{{ URL::asset('svg/home.svg') }}">
                <p class="optiontext">Home</p>
            </div>
            <div>
                <img class="option" src="{{ URL::asset('svg/add.svg') }}">
                <p class="optiontext">Post an ad</p>
            </div>
            <div>
                <img class="option" src="{{ URL::asset('svg/admin.svg') }}">
                <p class="optiontext">Admin panel</p>
            </div>
            <div>
                <img class="option" src="{{ URL::asset('svg/profile.svg') }}">
                <p class="optiontext">Profile</p>
            </div>
            <div>
                <img class="option" src="{{ URL::asset('svg/logout.svg') }}">
                <p class="optiontext">Log Out</p>
            </div>
        </nav>
    </div>
</body>
</html>