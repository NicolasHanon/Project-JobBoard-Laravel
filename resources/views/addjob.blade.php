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
        <p>Create a job advert</p>
        <div class="form_container">
            <div class="morespace">
                <div class="container_children">
                    <label for="title">Job Title</label>
                    <input id="title" type="text" name="title">
                </div>
                <div class="container_children">
                    <label for="contract">Contract Type</label>
                    <select id="contract" name="contract">
                        <option value="" selected disabled hidden>-- Choose here --</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Freelance">Freelance</option>
                        <option value="Apprenticeship">Apprenticeship</option>
                        <option value="Internship">Internship</option>
                    </select>
                </div>
            </div>
            <label for="description">Description of the position</label>
            <textarea id="more" name="description"></textarea>
            <div class="morespace">
                <label for="salary">Average salary</label>
                <input id="salary" style="width: 20%;" type="text" name="salary">
                <label for="salary">-</label>
                <input id="salary2" style="width: 20%;" type="text" name="salary">
            </div>
            <div class="morespace">
                <label for="location">Location</label>
                <input id="location" type="text" name="location">
            </div>
            <button onclick="postJob()">Post job</button>
        </div>
</div>
</body>
</html>

@if (Auth::check())
    <script>
        var userId = {{ Auth::user()->id }};
    </script>
@else
    <script>
        var userId = null;
    </script>
@endif

<script src="{{ asset('js/addjob.js')}}"></script>