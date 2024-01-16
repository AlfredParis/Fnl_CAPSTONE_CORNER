@extends('layout.dashboardLayout')

@section('title')
    Audit
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
            <a class="nav-link text-white" href="{{ route('superAdmin.department') }}">
                <i class="fs-7 fa fa-users"></i><span class="fs-6 d-none ms-2 d-sm-inline">Department</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('superAdmin.adminTB') }}">
                <i class="fs-7 fa fa-user-gear"></i><span class="fs-6 d-none ms-2 d-sm-inline">Admin</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white active" aria-current="true" href="{{ route('superAdmin.audit') }}">
                <i class="fs-7 fa fa-clipboard"></i><span class="fs-6 d-none ms-2    d-sm-inline">Audit</span>
            </a>
        </li>
    @endsection

    @section('main')
        <h1>AUDIT</h1>

        <table class=" table table-primary"><br>



            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">category</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notif as $not)
                    <tr class="table table-secondary">
                        <td scope="row">{{ $not->created_at }}</td>
                        <td scope="row">{{ $not->category }}</td>
                        <td scope="row">{{ $not->content }}</td>







                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $notif->links() }}
    @endsection
