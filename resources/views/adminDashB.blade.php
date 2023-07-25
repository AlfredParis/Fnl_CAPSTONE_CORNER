@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="active">Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="inactive">Archives</a>
    <a href="{{ route('admin.checker') }}" class="inactive">Checker</a>
    <a href="{{ route('admin.student') }}" class="inactive">Student</a>
    <a href="{{ route('admin.faculty') }}" class="inactive">Faculty</a>
    <a href="{{ route('admin.admin') }}" class="inactive">Admin</a>
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
