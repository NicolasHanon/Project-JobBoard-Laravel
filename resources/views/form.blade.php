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
    <div class="container">
        <p>Create a job advert</p>
        <form class="form_container">
            <div>
                <label for="title"><b>Job Title</b></label>
                <input type="text" name="title" required>
                <label for="contract"><b>Contract Type</b></label>
                <select name="contract" required>
                    <option value="" selected disabled hidden>-- Choose here --</option>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Freelance">Freelance</option>
                    <option value="Apprenticeship">Apprenticeship</option>
                    <option value="Internship">Internship</option>
                </select>
            </div>
            <label for="description"><b>Description of the position</b></label>
            <textarea name="description"></textarea>
            <div>
                <label for="location"><b>Location</b></label>
                <input type="text" name="location" required>
            </div>
            <button type="submit">Send ad</button>
        </form>
</div>
</body>
</html>

<!-- <script src="{{ asset('js/form.js')}}"></script> -->