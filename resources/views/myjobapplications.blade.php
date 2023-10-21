@extends('shared.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/index.css') }}" />
@endsection

@section('content')
    <div>
        <p class="joblabel">Job title :</p>
        <p id="title" class="jobdata"></p>
    </div>
    <div>
        <p class="joblabel">Contract type :</p>
        <p id="contract" class="jobdata"></p>
    </div>
    <div>
        <p class="joblabel">Company : </p>
        <p id="name" class="jobdata"></p>
    </div>
    <div>
        <p class="joblabel">Job description :</p>
        <p id="more" class="jobdata"></p>
    </div>
    <div>
        <p class="joblabel">Job location : </p>
        <p id="location" class="jobdata"></p>
    </div>
    <div>
        <p class="joblabel">Job salary : </p>
        <p id="salary" class="jobdata"></p>
    </div>

    <div class="apply">
        <textarea id="textarea" placeholder="Why should we hire you ?"></textarea>
        <button onclick="updateApply()">Update apply</button>
    </div>
    <p id="response" class="response"></p>
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
    <script src="{{ asset('js/jobapplications.js')}}"></script>
@endsection