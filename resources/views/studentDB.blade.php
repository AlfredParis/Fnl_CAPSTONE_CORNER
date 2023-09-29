@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
    <a href="{{ route('studentt.index') }}" class="active">Dashboard</a>
    <a href="{{ route('studentt.myArchive') }}" class="inactive">My Archive</a>
    <a href="{{ route('studentt.Checker') }}" class="inactive">Checker</a>
    {{-- <a href="{{ route('logout') }}" class="inactive">Logout</a> --}}
@endsection

@section('main')
    <div class="dashB">
        <div class="top"> acctype : {{ $accT = Session::get('accT') }}
            <br> Name: {{ $acc = Session::get('fullNs') }}
        </div>
        <div class="admin">Total number of admin:{{ $tl_admin }}</div>
        <div class="stud">Total number of student:{{ $tl_stud }} </div>
        <div class="fac">Total number of faculty:{{ $tl_fac }} </div>
        <div class="arch">Total number of archives:{{ $tl_arch }} </div>







    </div>
    </div>
@endsection
