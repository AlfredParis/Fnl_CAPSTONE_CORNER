@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
    <a href="{{ route('studentt.index') }}" class="actives">Dashboard</a>
    <a href="{{ route('studentt.myArchive') }}" class="inactive">My Archive</a>
    <a href="{{ route('studentt.Checker') }}" class="inactive">Checker</a>

@endsection

@section('main')
    <div class="dashB">
        <div class="admin">
            <img class="dashimg" src="{{ asset('images/admin.png') }}" alt="">
            <p >{{ $tl_admin }} </p>
            <div class="num">Admin</div>
        </div>
        <div class="stud">
            <img class="dashimg" src="{{ asset('images/student.png') }}" alt="">
            <p> {{ $tl_stud }} </p>
            <div class="num">Student</div>
        </div>
        <div class="fac">
            <img class="dashimg" src="{{ asset('images/fac.png') }}" alt="">
            <p>{{ $tl_fac }}  </p>
            <div class="num">Faculty</div>
        </div>
        <div class="arch">
            <img class="dashimg" src="{{ asset('images/arch.png') }}" alt="">
            <p>  {{ $tl_arch }}</p>
            <div class="num">Archives</div>
        </div>
    </div>

@endsection
