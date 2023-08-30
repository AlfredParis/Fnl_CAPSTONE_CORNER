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
    <div class="dashB">
        <div class="top"> acctype : {{ $accT = Session::get('accT') }}
            <br> Name: {{ $acc = Session::get('fullNs') }}
        </div>
        <div class="admin">Total number of admin:{{ $tl_admin }}</div>
        <div class="stud">Total number of student:{{ $tl_admin }} </div>
        <div class="fac">Total number of faculty:{{ $tl_admin }} </div>
        <div class="arch">Total number of archives:{{ $tl_arch }} </div>







    </div>
    </div>
@endsection
