@extends('layout.dashboardLayout')

@section('title')
    Faculty Student Table
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4">
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
</ul>
@endsection

@section('main')
@php
$userAdd = 'student';
@endphp
<table class="table table-striped">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
    Add student
</button>


<thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Full Name</th>
        <th scope="col">Course</th>
        <th scope="col">View</th>
        <th scope="col">Edit</th>
    </tr>
</thead>
<tbody>
    @foreach ($SN as $student)
        <tr>

            <td scope="row">{{ $student->S_ID }}</td>
            <td scope="row">{{ $student->NAME }}</td>
            <td scope="row">{{ $student->C_DESC }}</td>
            <td scope="row"><a href="/usercc/{{ $student->S_ID }}" class="glowbtn"><i
                        class="fs-7 fa fa-eye"></i></a></td>

            <td scope="row">
                @php
                    $id=$student->S_ID;
                @endphp
                <a href="#editUser_{{$id}}" data-bs-toggle="modal">
                    <i class="fs-7 fa fa-pen-to-square"></i></a>

                @include('modal.editUser')
            </td>




        </tr>
    @endforeach
</tbody>
</table>

{{ $SN->links() }}
@endsection

@include('modal.facultyAdduser')
