@extends('shared.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/index.css') }}" />
@endsection

@section('content')
    <input id="job_id" type="hidden" name="job_id" value="{{ $job_id }}" />
    <div>
        <p class="joblabel">Name : </p>
        <p id="name" class="jobdata"></p>
    </div>
    <div>
        <p class="joblabel">Last name : </p>
        <p id="lastname" class="jobdata"></p>
    </div>
    <div>
        <p class="joblabel">Email : </p>
        <p id="email" class="jobdata"></p>
    </div>
    <div>
        <p class="joblabel">Phone : </p>
        <p id="phone" class="jobdata"></p>
    </div>
    <div>
        <p class="joblabel">More : </p>
        <p id="more" class="jobdata"></p>
    </div>
    <div>
        <p class="joblabel">Why should you hire me ? </p>
        <p id="message" class="jobdata"></p>
    </div>
    <div class="accepted_container">
        <button onclick="updateAccepted(2)" id="accepted" class="accepted disabled">Accepted</button>
        <button onclick="updateAccepted(0)" id="waiting" class="waiting disabled">Waiting</button>
        <button onclick="updateAccepted(1)" id="rejected" class="rejected disabled">Rejected</button>
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
    <script src="{{ asset('js/candidates.js')}}"></script>
@endsection