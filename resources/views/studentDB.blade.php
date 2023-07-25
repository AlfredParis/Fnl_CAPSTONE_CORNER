@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
    <a href="{{ route('studentt.index') }}" class="active">dashboard</a>
    <a href="{{ route('studentt.myArchive') }}" class="inactive">My Archive</a>
    <a href="{{ route('studentt.Checker') }}" class="inactive">Checker</a>
    {{-- <a href="{{ route('logout') }}" class="inactive">Logout</a> --}}
@endsection

@section('main')
    <br>
    <div class="container">
        dashboard here <br>
        acctype : {{ $accT = Session::get('fullNs') }}
    </div>
    </div>
@endsection
