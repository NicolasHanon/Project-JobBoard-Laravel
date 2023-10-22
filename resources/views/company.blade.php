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
        <p>Manage my company</p>
        <div class="form_container" autocomplete="off">
            <div class="morespace" style="gap: 20px;">
                <div class="container_children">
                    <label for="name">Company name is</label>
                    <input id="name" type="text" name="name">
                </div>
                <div class="container_children">
                    <label for="type">Company type is</label>
                    <input id="type" type="text" name="type">
                </div>
                <div class="container_children">
                    <label for="headquarter">Headquarter address is</label>
                    <input id="headquarter" type="text" name="headquarter">
                </div>
            </div>
            <label for="about">About your company</label>
            <textarea id="about" name="about"></textarea>
            <button onclick="saveChanges()">Save changes</button>
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

<script src="{{ asset('js/company.js')}}"></script>