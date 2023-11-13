@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
    <ul class="nav nav-pills flex-column mt-4">
        <li class="nav-item py-2 py-sm-0">
            <a href="{{ route('studentt.index') }}" class="nav-link text-white active" aria-current="true" ><i class="fs-5 fa fa-house"></i><span class="fs-4 d-none ms-2 d-sm-inline">Dashboard</span></a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a href="{{ route('studentt.myArchive') }}" class="nav-link text-white"><i class="fs-5 fa fa-box-archive"></i><span class="fs-4 d-none ms-2 d-sm-inline">My Archive</span></a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a href="{{ route('studentt.Checker') }}" class="nav-link text-white"><i class="fs-5 fa fa-check"></i><span class="fs-4 d-none ms-2 d-sm-inline">Checker</span></a>
        </li>
    </ul>
    @endsection

    @section('main')
        <div class="container text-center">
            <div class="row row-cols-2">
                <div class="col p-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/18771.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tl_admin }}</h5>
                            <p class="card-text">ADMIN</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col p-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/students_09.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tl_stud }}</h5>
                            <p class="card-text">STUDENT</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col p-2">

                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/fac.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tl_fac }}</h5>
                            <p class="card-text">FACULTY</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col p-2">

                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/829.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tl_arch }}</h5>
                            <p class="card-text">ARCHIVES</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    @endsection
