@extends('layout.dashboardLayout')

@section('title')
    Archive Table
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('faculty.index') }}">
            <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white active" aria-current="true" href="{{ route('faculty.myArchive') }}">
            <i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline">Archives</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " href="{{ route('faculty.Checker') }}">
            <i class="fs-7 fa fa-check"></i><span class="fs-6 d-none ms-2 d-sm-inline">Checker</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " href="{{ route('faculty.student') }}">
            <i class="fs-7 fa fa-user-graduate"></i><span class="fs-6 d-none ms-2 d-sm-inline">Student</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " aria-current="true" href="{{ route('faculty.student') }}">
            <i class="fs-7 fa fa-users-rectangle"></i><span class="fs-7 d-none ms-2 d-sm-inline">Advisory</span>
        </a>
    </li>
</ul>
    @endsection
    {{-- TODO: dapat naka display dito yung mga archives tapos may add button na nandoon yung form dapat nang add archives --}}
    @section('main')
        {{-- <a href="{{ route('admin.addArch') }}" class="btn btn-primary">Add Archive</a> --}}


        <div class="container" style="margin-left: 0;">
            <div class="row">
                <div class="col auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        Add Archive
                    </button>
                </div>
                <div class="col">
                    <form action="{{ route('admin.archives') }}" method="get">
                        <div class="input-group">

                            <input type="search" class="form-control rounded"
                                placeholder="Search arvhive name or publish date" aria-label="Search"
                                aria-describedby="search-addon" name="search" />
                            <button type="submit" class="btn btn-outline-primary">Search</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>





        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Archive ID</th>
                    <th scope="col">Archive Title</th>

                    <th scope="col"> Documentation</th>
                    <th scope="col"> GitHub Repository</th>
                    <th scope="col"> View </th>
                    <th scope="col"> Edit </th>

                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($trnd as $archive)
                    <tr>
                        @php

                            $i = $i + 1;

                        @endphp
                        <td scope="row">{{ $archive->ARCH_ID }}</td>
                        <td scope="row">{{ $archive->TITLE }}</td>
                        <td scope="row">{{ $archive->GROUP_ID }}</td>
                        <td scope="row">{{ $archive->ADVISER_ID }}</td>
                        <td scope="row">{{ $archive->ABS }}</td>
                        <td scope="row">{{ $archive->DOCU }}</td>
                        <td scope="row">{{ $archive->PUB }}</td> 
                @endforeach
            </tbody>
        </table>
        {{ $trnd->links() }}



    @endsection
