@extends('layout.dashboardLayout')

@section('title')
    Archive Table
@endsection

@section('topnav')
    <ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('admin.index') }}">
                <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" aria-current="true" href="{{ route('admin.archives') }}">
                <i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline ">Archives</span>
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
            <a class="nav-link text-white" href="{{ route('admin.faculty') }}">
                <i class="fs-7 fa fa-users"></i><span class="fs-6 d-none ms-2 d-sm-inline">Faculty</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('admin.admin') }}">
                <i class="fs-7 fa fa-user-gear"></i><span class="fs-6 d-none ms-2 d-sm-inline">Admin</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('admin.audit') }}">
                <i class="fs-7 fa fa-clipboard"></i><span class="fs-6 d-none ms-2    d-sm-inline">Audit</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white active" href="{{ route('admin.turnedOverArch') }}">
                <i class="fs-7 fa fa-clipboard"></i><span class="fs-6 d-none ms-2    d-sm-inline">Turned Overed</span>
            </a>
        </li>
    @endsection
    {{-- TODO: dapat naka display dito yung mga archives tapos may add button na nandoon yung form dapat nang add archives --}}
    @section('main')
    <h1>Finalized</h1>
    <div class="container-fluid ">
    
        <div class="row " style="margin-top: 1rem;">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Archive ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Group Name</th>
                            <th scope="col">Abstract</th>
                            <th scope="col">Department</th>
                            <th scope="col">Document</th>
                            <th scope="col">Adviser</th>
                            <th scope="col">Date</th>
                            <th scope="col">Send</th>
                        </tr>
                    </thead>
                    <tbody>
    
                        @php
                        $i = 0;
                        @endphp
                        @foreach ($groups as $archive)
                        @php
                            $adviserName=\App\Models\EMPLOYEE::where('EMP_ID', $archive->ADVISER_ID)->value("NAME");
                            $grp_name=\App\Models\group::where('id', $archive->GROUP_ID)->value("GRP_NAME");
                            $dept=\App\Models\department::where('id', $archive->DEPT_ID)->value("DEPT_NAME");
                        @endphp
                        <tr>
                            @php
                            $i = $i + 1;
                            @endphp
                            <td> {{ $archive->ARCH_ID}}</td>
                            <td> {{ $archive->TITLE}}</td>
                            <td> {{ $grp_name}}</td>
                            <td> {{ $archive->ABS}}</td>
                            <td> {{ $dept}}</td> 
                            <td> {{ $archive->DOCU}}</td>
                            <td> {{ $adviserName}}</td> 
                            <td> {{ $archive->updated_at}}</td>     
                            <td>
                                <form action="{{route('admin.toPublish',['trndID' => $archive->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                    <input type="submit" value="Publish"  class="btn btn-success">
                                </form>
    
                            </td>
                             {{-- <td> <a class="btn btn-primary" href="{{ route('subAdmin.toAdmin',['trndID' => $archive->id]) }}">Send</a> </td>
                        --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $groups->links() }}
            </div>
        </div>
    </div>
    @endsection
