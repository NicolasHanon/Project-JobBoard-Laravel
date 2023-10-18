@extends('shared.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/index.css') }}" />
@endsection

@section('content')
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
@endsection
        
@section('script')
    <script src="{{ asset('js/index.js')}}"></script>
@endsection