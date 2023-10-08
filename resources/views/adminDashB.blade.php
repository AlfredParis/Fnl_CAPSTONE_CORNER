@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="actives">Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="inactive">Archives</a>
    <a href="{{ route('admin.checker') }}" class="inactive">Checker</a>
    <a href="{{ route('admin.student') }}" class="inactive">Student</a>
    <a href="{{ route('admin.faculty') }}" class="inactive">Faculty</a>
    <a href="{{ route('admin.admin') }}" class="inactive">Admin</a>
@endsection

@section('main')
    <br>
    <div class="dashB">

        <div class="admin">
            <img class="dashimg" src="{{ asset('images/admin.png') }}" alt="">
            <p> Admin: </p>
            <div class="num">{{ $tl_admin }}</div>
        </div>
        <div class="stud">
            <img class="dashimg" src="{{ asset('images/student.png') }}" alt="">
            <p> Student: </p>
            <div class="num">{{ $tl_stud }}</div>
        </div>
        <div class="fac">
            <img class="dashimg" src="{{ asset('images/fac.png') }}" alt="">
            <p> Faculty: </p>
            <div class="num">{{ $tl_fac }}</div>
        </div>
        <div class="arch">
            <img class="dashimg" src="{{ asset('images/arch.png') }}" alt="">
            <p> Archives: </p>
            <div class="num">{{ $tl_arch }}</div>
        </div>







    </div>
    </div>
@endsection
