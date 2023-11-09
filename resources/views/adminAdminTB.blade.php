@extends('layout.dashboardLayout')

@section('title')
    Admin Table
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4">
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.index') }}">
            <i class="fs-5 fa fa-house"></i><span class="fs-4 d-none ms-2 d-sm-inline">Dashboard</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.archives') }}">
            <i class="fs-5 fa fa-box-archive"></i><span class="fs-4 d-none ms-2 d-sm-inline">Archives</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.checker') }}">
            <i class="fs-5 fa fa-check"></i><span class="fs-4 d-none ms-2 d-sm-inline">Checker</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.student') }}">
            <i class="fs-5 fa fa-user-graduate"></i><span class="fs-4 d-none ms-2 d-sm-inline">Student</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.faculty') }}">
            <i class="fs-5 fa fa-users"></i><span class="fs-4 d-none ms-2 d-sm-inline">Faculty</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white active" aria-current="true" href="{{ route('admin.admin') }}">
            <i class="fs-5 fa fa-user-gear"></i><span class="fs-4 d-none ms-2 d-sm-inline">Admin</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('admin.audit') }}">
            <i class="fs-5 fa fa-clipboard"></i><span class="fs-4 d-none ms-2    d-sm-inline">Audit</span>
        </a>
    </li>

@endsection

@section('main')
    <br>



        <table class="table table-striped">
            {{-- <img class="tbimg" src="{{ asset('images/admin.png') }}" alt="">  --}}
            <a href="{{ route('admin.addUser', ['user' => 'admin']) }}" class="btn btn-primary">Add admin</a>

            <br><br>
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
                @foreach ($admin as $adm)
                    <tr>

                        <td scope="row">{{ $adm->EMP_ID }}</td>
                        <td scope="row">{{ $adm->NAME }}</td>
                        <td scope="row">{{ decrypt($adm->PASSWORD) }}</td>
                        <td scope="row"><a href="/usercc/{{ $adm->USER_ID_EMP }}" class="glowbtn"><i class="fs-5 fa fa-eye"></i></a></td>

                        <td scope="row"><a href="{{ route('admin.edit', ['USER_ID_EMP' => $adm->EMP_ID]) }}" class="glowbtn"><i class="fs-5 fa fa-pen-to-square"></i></a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>


    <div class="pagination">{{ $admin->links() }}</div>
@endsection
