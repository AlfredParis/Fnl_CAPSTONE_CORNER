@extends('layout.dashboardLayout')

@section('title')
progs Table
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('superAdmin.index') }}">
            <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " aria-current="true" href="{{ route('superAdmin.archives') }}">
            <i class="fs-7 fa fa-box-progs"></i><span class="fs-6 d-none ms-2 d-sm-inline ">archives</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('superAdmin.index') }}">
            <i class="fs-7 fa fa-check"></i><span class="fs-6 d-none ms-2 d-sm-inline">Checker</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('superAdmin.student') }}">
            <i class="fs-7 fa fa-user-graduate"></i><span class="fs-6 d-none ms-2 d-sm-inline">Student</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white active" href="{{ route('superAdmin.index') }}">
            <i class="fs-7 fa fa-users"></i><span class="fs-6 d-none ms-2 d-sm-inline">Department</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('superAdmin.adminTB') }}">
            <i class="fs-7 fa fa-user-gear"></i><span class="fs-6 d-none ms-2 d-sm-inline">Admin</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " href="{{ route('superAdmin.group') }}">
            <i class="fs-7 fa fa-people-group"></i><span class="fs-6 d-none ms-2 d-sm-inline">group</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('superAdmin.audit') }}">
            <i class="fs-7 fa fa-clipboard"></i><span class="fs-6 d-none ms-2    d-sm-inline">Audit</span>
        </a>
    </li>
    @endsection

    @section('main')
    <h1>PROGRAMS</h1>
    <table class="table table-striped">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#progAdd">
            Add Program
        </button>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Program Name</th>
                <th scope="col">Program abbreviation</th>
                <th scope="col"> View Departments </th>
                <th scope="col"> Edit </th>
            </tr>
        </thead>
        <tbody> @php
            $i = 0;
            @endphp
            @foreach ($prog as $pro)
            <tr>
                @php

                $i = $i + 1;

                @endphp
                @include('superAdmin.SAmodal.programView')
                @include('superAdmin.SAmodal.programEdit')

                <td scope="row">{{ $pro->id }}</td>
                <td scope="row">{{ $pro->PROG_NAME }}</td>
                <td scope="row">{{$pro->PROG_ABBR }}</td>
                <td scope="row">
                    <a href="#progView{{ $pro->id }}" data-bs-toggle="modal">
                        <i class="fs-5 fa fa-eye"></i></a>
                </td>
                <td scope="row">
                    <a href="#progEdit{{ $pro->id }}" data-bs-toggle="modal">
                        <i class="fs-5 fa fa-pen-to-square"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">{{ $prog->links() }}</div>
    @endsection