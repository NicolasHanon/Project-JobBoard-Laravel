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
    <div class="job_container">
        <main>
            @foreach ($data as $job)
                <p class="job" data-id="{{ $job->id }}">{{ $job->title }} - {{ $job->name }}</p>
                <div class="separator"></div>
                <input id="input" type="hidden" value="{{ $job->id }}">
            @endforeach
        </main>
        <aside class="content-drill">
            <img class="rightarrow" src="{{ URL::asset('svg/rightarrow.svg') }}">
            <div class="content">
                <p>Content</p>
                <form>
                    <textarea placeholder="Why we should hire you ?"></textarea>
                    <input type="submit" value="Apply">
                </form>
            </div>
        </aside>
    </div>
</body>
</html>

<script src="{{ asset('js/index.js')}}"></script>