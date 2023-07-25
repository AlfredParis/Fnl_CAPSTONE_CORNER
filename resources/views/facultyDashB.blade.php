@extends('layout.dashboardLayout')

@section('title')
    Faculty Dashboard
@endsection

@section('topnav')
    <a href="{{ route('faculty.index') }}" class="active">Dashboard</a>
    <a href="{{ route('faculty.myArchive') }}" class="inactive">Archives</a>
    <a href="{{ route('faculty.Checker') }}" class="inactive">Checker</a>
    <a href="{{ route('faculty.student') }}" class="inactive">Student</a>
@endsection

@section('main')
    <br>
    <div class="container">
        dashboard here <br>
        acctype : {{ $accT = Session::get('accT') }}<br>
        {{ $acc = Session::get('fullNs') }}
    </div>
    </div>
@endsection
