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
    <div class="dashB">

        <div class="admin">Total number of admin:{{ $tl_admin }}</div>
        <div class="stud">Total number of student:{{ $tl_stud }} </div>
        <div class="fac">Total number of faculty:{{ $tl_fac }} </div>
        <div class="arch">Total number of archives:{{ $tl_arch }} </div>







    </div>
    </div>
@endsection
