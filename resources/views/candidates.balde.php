@extends('shared.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/index.css') }}" />
@endsection

@section('content')
    <!-- <div>
        <p class="joblabel">Job title :</p>
        <input id="title" class="jobdata"/>
    </div>
    <div>
        <p class="joblabel">Contract type :</p>
        <input id="contract" class="jobdata"/>
    </div>
    <div>
        <p class="joblabel">Job description :</p>
        <input id="more" class="jobdata"/>
    </div>
    <div>
        <p class="joblabel">Job location : </p>
        <input id="location" class="jobdata"/>
    </div>
    <div>
        <img id="candidates" src="{{ URL::asset('svg/candidates.svg') }}">
        <a href="/newjob">View candidates</a>
    </div>
    <div class="apply">
        <button id="updateBtn" onclick="updateJobs()">Update jobs</button>
    </div> -->
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
    <!-- <script src="{{ asset('js/joblisting.js')}}"></script> -->
@endsection