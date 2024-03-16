@extends('layout.dashboardLayout')

@section('title')
    Faculty Student Table
@endsection

@section('topnav')
    <ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('faculty.index') }}">
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
            <a class="nav-link text-white  active" aria-current="true" href="{{ route('faculty.student') }}">
                <i class="fs-7 fa fa-user-graduate"></i><span class="fs-7 d-none ms-2 d-sm-inline">Student</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white " aria-current="true" href="{{ route('faculty.advisory') }}">
                <i class="fs-7 fa fa-users-rectangle"></i><span class="fs-7 d-none ms-2 d-sm-inline">Advisory</span>
            </a>
        </li>
    </ul>
@endsection

@section('main')
<div class="pddingForBody">
    @php
        $userAdd = 'student';
    @endphp
    <table class="table table-striped">



        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Course</th>
                <th scope="col">View</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody> @php
            $i = 0;
        @endphp
            @foreach ($SN as $student)
                <tr>
                    @php

                        $i = $i + 1;

                    @endphp
                    <td scope="row">{{ $student->S_ID }}</td>
                    <td scope="row">{{ $student->NAME }}</td>
                    <td scope="row">{{ $student->DEPT_NAME }}</td>
                    <td scope="row">
                        @php
                            $id = $student->S_ID;
                        @endphp
                        <a href="#viewUser_{{ $id }}" data-bs-toggle="modal">
                            <i class="fs-5 fa fa-eye"></i></a>

                        @include('modal.studentView')

                    </td>

                    <td scope="row">
                        @php
                            $id = $student->S_ID;
                        @endphp
                        <a href="#editUser_{{ $id }}" data-bs-toggle="modal">
                            <i class="fs-7 fa fa-pen-to-square"></i></a>

                        @include('modal.editUser')
                    </td>




                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $SN->links() }}
</div>
@endsection

@include('modal.facultyAdduser')
