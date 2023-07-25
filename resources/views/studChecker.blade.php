@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
    <a href="{{ route('studentt.index') }}" class="inactive">dashboard</a>
    <a href="{{ route('studentt.myArchive') }}" class="inactive">My Archive</a>
    <a href="{{ route('studentt.Checker') }}" class="active">Checker</a>
@endsection

@section('main')
    <br>
    <div class="container">
        checker
    </div>
    </div>
@endsection
