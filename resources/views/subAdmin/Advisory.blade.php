@extends('layout.dashboardLayout')

@section('title')
My Advisory
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " aria-current="true" href="{{ route('faculty.index') }}">
            <i class="fs-7 fa fa-house"></i><span class="fs-7 d-none ms-2 d-sm-inline">Dashboard</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " href="{{ route('faculty.myArchive') }}">
            <i class="fs-7 fa fa-box-archive"></i><span class="fs-7 d-none ms-2 d-sm-inline">Archives</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " href="{{ route('faculty.Checker') }}">
            <i class="fs-7 fa fa-check"></i><span class="fs-7 d-none ms-2 d-sm-inline">Checker</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " href="{{ route('faculty.student') }}">
            <i class="fs-7 fa fa-user-graduate"></i><span class="fs-7 d-none ms-2 d-sm-inline">Student</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white active" aria-current="true" href="{{ route('faculty.advisory') }}">
            <i class="fs-7 fa fa-users-rectangle"></i><span class="fs-7 d-none ms-2 d-sm-inline">Advisory</span>
        </a>
    </li>
</ul>
@endsection

@section('main')

<div class="container-fluid ">

    <div class="row " style="margin-top: 1rem;">
        <div class="col-md-12">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Group Name</th>


                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;

                    @endphp
                    @foreach ($groups as $archive)

                    <tr>
                        @php

                        $i = $i + 1;

                        @endphp

                        <td> {{ $archive->GRP_NAME}}</td>
                        <td> <a class="btn btn-primary"
                                href="{{ route('subAdmin.myGroup',['advisory' => $archive->id]) }}">open</a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>






        </div>
    </div>
</div>
@endsection
