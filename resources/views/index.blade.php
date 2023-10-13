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
<div class="nav">
        <p>JobBoard</p>
        <img class="menu" onClick="showNav()" src="{{ URL::asset('svg/menu.svg') }}">
        <nav class="burger-drill">
            <div>
                <img class="option" src="{{ URL::asset('svg/home.svg') }}">
                <a href="/index"><p class="optiontext">Home</p></a>
            </div>
            <div>
                <img class="option" src="{{ URL::asset('svg/add.svg') }}">
                <a href="/newjob"><p class="optiontext">Post an ad</p></a>
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
                <img class="option" src="{{ URL::asset('svg/signin.svg') }}">
                <p class="optiontext">Sign in</p>
            </div>
            <div>
                <img class="option" src="{{ URL::asset('svg/signout.svg') }}">
                <a href="/login"><p class="optiontext">Log Out</p></a>
            </div>
        </nav>
    </div>
    <div class="job_container">
        <main>
            @foreach ($data as $job)
                <p class="job" data-id="{{ $job->id }}"><span data-id="{{ $job->id }}">{{ $job->title }} - </span>{{ $job->name }}</p>
                <div class="separator"></div>
                <input id="input" type="hidden" value="{{ $job->id }}">
            @endforeach
        </main>
        <aside class="content-drill">
            <img class="rightarrow" src="{{ URL::asset('svg/rightarrow.svg') }}">
            <div class="content">
                <div>
                    <p class="joblabel">Job title : </p>
                    <p class="jobtitle jobdata"></p>
                </div>
                <div>
                    <p class="joblabel">Contract type : </p>
                    <p class="jobcontract jobdata"></p>
                </div>
                <div>
                    <p class="joblabel">Company : </p>
                    <p class="jobcompany jobdata"></p>
                </div>
                <div>
                    <p class="joblabel">Job description : </p>
                    <p class="jobdescription jobdata"></p>
                </div>
                <div>
                    <p class="joblabel">Job location : </p>
                    <p class="joblocation jobdata"></p>
                </div>
                <form>
                    <textarea placeholder="Why should we hire you ?"></textarea>
                    <input type="submit" value="Apply">
                </form>
            </div>
        </aside>
    </div>
</body>
</html>

<script src="{{ asset('js/index.js')}}"></script>