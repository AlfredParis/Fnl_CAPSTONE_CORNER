@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
    <a href="{{ route('studentt.index') }}" class="inactive">dashboard</a>
    <a href="{{ route('studentt.myArchive') }}" class="active">My Archive</a>
    <a href="{{ route('studentt.Checker') }}" class="inactive">Checker</a>
@endsection

@section('main')
    <br>
    <div class="container">
        my archives goes here
    </div>
    </div>
@endsection
