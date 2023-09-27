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

        <div class="admin"><p> Total number of admin: <br> <strong>{{ $tl_admin }}</strong> </p></div>
        <div class="stud"><p>Total number of student: <br><strong> {{ $tl_stud }}</strong> </p></div>
        <div class="fac"><p>Total number of faculty: <br> <strong>{{ $tl_fac }}</strong> </p></div>
        <div class="arch"><p>Total number of archives: <br> <strong>    {{ $tl_arch }} </strong>    </p></div>







    </div>
    </div>
@endsection
