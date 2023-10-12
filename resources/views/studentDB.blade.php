@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
    <a href="{{ route('studentt.index') }}" class="actives">Dashboard</a>
    <a href="{{ route('studentt.myArchive') }}" class="inactive">My Archive</a>
    <a href="{{ route('studentt.Checker') }}" class="inactive">Checker</a>
    {{-- <a href="{{ route('logout') }}" class="inactive">Logout</a> --}}
@endsection

@section('main')
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
