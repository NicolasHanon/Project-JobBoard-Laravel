@extends('shared.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/index.css') }}" />
@endsection

@section('content')
    <div>
        <p class="joblabel">Job title :</p>
        <input style="width: 40%;" id="title" class="jobdata"/>
    </div>
    <div>
        <p class="joblabel">Contract type :</p>
        <select id="contract" name="contract">
            <option value="" selected disabled hidden>-- Choose here --</option>
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Freelance">Freelance</option>
            <option value="Apprenticeship">Apprenticeship</option>
            <option value="Internship">Internship</option>
        </select>
    </div>
    <div>
        <p class="joblabel">Job description :</p>
        <input style="width: 90%;" id="more" class="jobdata"/>
    </div>
    <div>
        <p class="joblabel">Job location : </p>
        <input id="location" class="jobdata"/>
    </div>
    <div>
        <p class="joblabel">Job salary : </p>
        <input id="salary" class="jobdata"/>
    </div>
    <div>
        <img id="candidates" src="{{ URL::asset('svg/candidates.svg') }}">
        <a id="candidatesLink" href="#" data-base-url="{{ url('/candidates') }}">View candidates</a>
    </div>
    <div class="apply">
        <button id="updateBtn" onclick="updateJobs()">Update jobs</button>
    </div>
@endsection

@if (Auth::check())
    <script>
        var userId = {{ Auth::user()->id }};
    </script>
@else
    <script>
        var userId = null;
    </script>
@endif
        
@section('script')
    <script src="{{ asset('js/joblisting.js')}}"></script>
@endsection