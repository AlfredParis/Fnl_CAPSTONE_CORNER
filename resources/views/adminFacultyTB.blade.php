@extends('layout.dashboardLayout')

@section('title')
Faculty Table
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.index') }}">
            <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.archives') }}">
            <i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline">Archives</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.checker') }}">
            <i class="fs-7 fa fa-check"></i><span class="fs-6 d-none ms-2 d-sm-inline">Checker</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.student') }}">
            <i class="fs-7 fa fa-user-graduate"></i><span class="fs-6 d-none ms-2 d-sm-inline">Student</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white active" aria-current="true" href="{{ route('admin.faculty') }}">
            <i class="fs-7 fa fa-users"></i><span class="fs-6 d-none ms-2 d-sm-inline">Faculty</span>
        </a>
    </li>
    {{-- <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.admin') }}">
            <i class="fs-7 fa fa-user-gear"></i><span class="fs-6 d-none ms-2 d-sm-inline">Admin</span>
        </a>
    </li> --}}
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.audit') }}">
            <i class="fs-7 fa fa-clipboard"></i><span class="fs-6 d-none ms-2    d-sm-inline">Audit</span>
        </a>
    </li>
    @endsection

    @section('main')
    @php
    $userAdd = 'faculty';
    @endphp

    <table class="table table-striped">


        <thead>
            <tr>
                <th scope="col">ID</th>

                <th scope="col">Full Name</th>
                <th scope="col">Password</th>
                <th scope="col"> Views </th>
                <th scope="col"> Edit </th>
                {{-- <th> Delete </th> --}}
            </tr>
        </thead>
        <tbody>
            @php
            $i = 0;
            @endphp
            @foreach ($faculty as $fac)
            @php

            $i = $i + 1;

            @endphp
            <tr>

                <td scope="row">{{ $fac->EMP_ID }}</td>

                <td scope="row">{{ $fac->NAME }}</td>

                <td scope="row">
                    @php
                    $id = $fac->EMP_ID;
                    @endphp
                    <a href="#viewUser_{{ $id }}" data-bs-toggle="modal">
                        <i class="fs-5 fa fa-eye"></i></a>

                    @include('modal.studentView')

                </td>
                <td scope="row">
                    @php
                    $id = $fac->EMP_ID;
                    @endphp
                    <a href="#editUser_{{ $id }}" data-bs-toggle="modal">
                        <i class="fs-5 fa fa-pen-to-square"></i></a>

                    @include('modal.editUser')
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $faculty->links() }}
    @endsection
    @include('modal.adminAdduser')