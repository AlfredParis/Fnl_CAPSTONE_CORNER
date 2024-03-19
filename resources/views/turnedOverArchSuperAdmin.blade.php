@extends('layout.dashboardLayout')

@section('title')
Archive Table
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('superAdmin.index') }}">
            <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white active" href="{{ route('superAdmin.archives') }}">
            <i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline">Archives</span>
        </a>
    </li>
    {{-- <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('superAdmin.index') }}">
            <i class="fs-7 fa fa-check"></i><span class="fs-6 d-none ms-2 d-sm-inline">Checker</span>
        </a>
    </li> --}}
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
        <a class="nav-link text-white" aria-current="true" href="{{ route('superAdmin.adminTB') }}">
            <i class="fs-7 fa fa-user-gear"></i><span class="fs-6 d-none ms-2 d-sm-inline">Admin</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('superAdmin.group') }}">
            <i class="fs-7 fa fa-people-group"></i><span class="fs-6 d-none ms-2 d-sm-inline">group</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " href="{{ route('superAdmin.audit') }}">
            <i class="fs-7 fa fa-clipboard"></i><span class="fs-6 d-none ms-2    d-sm-inline">Audit</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('superAdmin.faculty') }}">
            <i class="fs-7 fa fa-clipboard"></i><span class="fs-6 d-none ms-2    d-sm-inline">Faculties and
                emplopyies</span>
        </a>
    </li>
</ul>
@endsection
{{-- TODO: dapat naka display dito yung mga archives tapos may add button na nandoon yung form dapat nang add archives
--}}
@section('main')
<h1>Archives</h1>


<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Archive ID</th>
            <th scope="col">Title</th>
            <th scope="col">Group Name</th>
            <th scope="col">Adviser</th>
            <th scope="col">Date</th>
            <th scope="col">View</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = 0;
        @endphp
        @foreach ($trnd as $archive)
        <tr>
            @php
            $adviserName=\App\Models\EMPLOYEE::where('EMP_ID', $archive->ADVISER_ID)->value("NAME");
            $grp_name=\App\Models\group::where('id', $archive->GROUP_ID)->value("GRP_NAME");
            $dept=\App\Models\department::where('id', $archive->DEPT_ID)->value("DEPT_NAME");
            @endphp
            @php

            $i = $i + 1;

            @endphp
            <td> {{ $archive->ARCH_ID}}</td>
            <td> {{ $archive->TITLE}}</td>

            <td> {{ $dept}}</td>

            <td> {{ $adviserName}}</td>
            <td> {{ $archive->updated_at}}</td>

            <td scope="row">
                <a class="btn" href="#archView{{ $archive->ARCH_ID }}" data-bs-toggle="modal"
                    onclick="incrementViewCount('{{ $archive->id }}')">
                    <i class="fa-solid fa-eye"></i></a>
            </td>

            <script>
                function incrementViewCount(archiveId) {
                            // Make an AJAX request to increment the view count
                            $.ajax({
                                url: `/viewCnt/${archiveId}`,
                                type: 'GET',
                                success: function(response) {
                                    console.log(response);
                                },
                                error: function(error) {
                                    console.error(error);
                                }
                            });
                        }
            </script>
            @include('modal.ViewArch')


            @endforeach
    </tbody>
</table>
{{ $trnd->links() }}



@endsection