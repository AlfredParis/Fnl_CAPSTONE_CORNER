@extends('layout.dashboardLayout')

@section('title')
    Admin Table
@endsection

@section('topnav')
    <ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('superAdmin.index') }}">
                <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('superAdmin.archives') }}">
                <i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline">Archives</span>
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
            <a class="nav-link text-white" href="{{ route('superAdmin.index') }}">
                <i class="fs-7 fa fa-users"></i><span class="fs-6 d-none ms-2 d-sm-inline">Faculty</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white " aria-current="true" href="{{ route('superAdmin.adminTB') }}">
                <i class="fs-7 fa fa-user-gear"></i><span class="fs-6 d-none ms-2 d-sm-inline">Admin</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white " href="{{ route('superAdmin.audit') }}">
                <i class="fs-7 fa fa-clipboard"></i><span class="fs-6 d-none ms-2    d-sm-inline">Audit</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white active" href="{{ route('superAdmin.audit') }}">
                <i class="fs-7 fa fa-clipboard"></i><span class="fs-6 d-none ms-2    d-sm-inline">Groups</span>
            </a>
        </li>
    @endsection

    @section('main')
        @php
            $userAdd = 'superAdmin';
        @endphp


        <table class="table table-striped">

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
                Add admin
            </button>

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Password</th>
                    <th scope="col"> Views </th>
                    <th scope="col"> Edit </th>

                </tr>
            </thead>
            <tbody> @php
                $i = 0;
            @endphp
                @foreach ($admin as $adm)
                    <tr>
                        @php

                            $i = $i + 1;

                        @endphp
                        <td scope="row">{{ $adm->EMP_ID }}</td>
                        <td scope="row">{{ $adm->NAME }}</td>
                        <td scope="row">{{ decrypt($adm->PASSWORD) }}</td>

                        <td scope="row">
                            @php
                                $id = $adm->EMP_ID;
                            @endphp
                            <a href="#viewUser_{{ $id }}" data-bs-toggle="modal">
                                <i class="fs-5 fa fa-eye"></i></a>

                            @include('modal.studentView')

                        </td>
                        <td scope="row">
                            @php
                                $id = $adm->EMP_ID;
                            @endphp
                            <a href="#editUser_{{ $id }}" data-bs-toggle="modal">
                                <i class="fs-5 fa fa-pen-to-square"></i></a>

                            @include('modal.editUser')
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="pagination">{{ $admin->links() }}</div>

    @endsection
    
    @include('modal.adminAdduser')
