@extends('shared.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/admin.css') }}" />
@endsection

@section('maincontent')
    <p class="table">Table name</p>
    <div class="separator"></div>
@endsection

@section('content')
<p>Table Name</p>
<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Job Title</th>
            <th>Twitter</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input value="Nicolas"></input></td>
            <td><input value="Garde"></input></td>
            <td><input value="nicolas.garde@hotmail.fr"></input></td>
            <td><input value="nicolas.garde@hotmail.fr"></input></td>
        </tr>
        <tr>
            <td><input value="Nicolas"></input></td>
            <td><input value="Hanon"></input></td>
            <td><input value="nicolas.hanon@hotmail.fr"></input></td>
            <td><input value="nicolas.garde@hotmail.fr"></input></td>
        </tr>
    </tbody>
</table>
<div>
    <button>Reset</button>
    <button>Save changes</button>
</div>
@endsection
        
@section('script')
    <script src="{{ asset('js/admin.js')}}"></script>
@endsection