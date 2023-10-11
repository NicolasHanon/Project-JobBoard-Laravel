<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/index.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Kanit:wght@200;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="head">
        <p>JobBoard</p>
        <img class="menu" onClick="showNav()" src="{{ URL::asset('svg/menu.svg') }}">
        <nav class="nav-drill">
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
    <div class="content_container">
        <main>
            @foreach ($data as $job)
                <p>{{ $job->title }} - {{ $job->name }}</p>
                <div style="border: 0.5px solid black; width: 25vw;"></div>
            @endforeach
        </main>
        <aside>
            <div class="content">
                <p>{{ $data }}</p>
            </div>
        </aside>
    </div>
</body>
</html>

<script src="{{ asset('js/index.js')}}"></script>