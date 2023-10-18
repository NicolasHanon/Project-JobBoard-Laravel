@extends('shared.layout')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheet/admin.css') }}" />
@endsection

@section('content')
<p id='tableName'></p>
<table id="table">
</table>
<button class="addbutton" onclick="addRow()"><img class="addrow" src="{{ URL::asset('svg/adding.svg') }}">Add row</button>
<button>Save changes</button>
<button>Reset</button>
@endsection
        
@section('script')
    <script src="{{ asset('js/admin.js')}}"></script>
@endsection