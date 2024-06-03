@extends('layout.dashboardLayout')

@section('title')
My Advisory
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " aria-current="true" href="{{ route('plagiarism.index') }}">
            <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white active" href="{{ route('plagiarism.Archives') }}">
            <i class="fs-7 fa fa-book"></i><span class="fs-6 d-none ms-2 d-sm-inline">Archives</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('plagiarism.For-plagiarism-checking') }}">
            <i class="fs-7 fa fa-user-graduate"></i><span class="fs-6 d-none ms-2 d-sm-inline">For plagiarism
                checking</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('plagiarism.plagiarism-checked') }}">
            <i class="fs-7 fa fa-user-graduate"></i><span class="fs-6 d-none ms-2 d-sm-inline">plagiarism checked</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('plagiarism.Certificates') }}">
            <i class="fs-7 fa fa-certificate"></i><span class="fs-6 d-none ms-2 d-sm-inline">Certificates</span>
        </a>
    </li>
</ul>
@endsection

@section('main')
<div class="pddingForBody">
    <h1>Archives</h1>

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
                @php
                $adviserName=\App\Models\EMPLOYEE::where('EMP_ID', $archive->ADVISER_ID)->value("NAME");
                $grp_name=\App\Models\group::where('id', $archive->GROUP_ID)->value("GRP_NAME");
                $dept=\App\Models\department::where('id', $archive->DEPT_ID)->value("DEPT_NAME");
                @endphp
                <td> {{ $archive->ARCH_ID}}</td>
                <td> {{ $archive->TITLE}}</td>
                <td> {{ $grp_name}}</td>
                <td> {{ $archive->ABS}}</td>
                <td> {{ $dept}}</td>
                <td scope="row">
                    <a href="#" onclick="openPDF('{{ asset('storage/pdfs/' . $archive->DOCU) }}');"
                        class="btn btn-primary">Open Document </a>
                </td>
                {{-- <td> {{ $archive->DOCU}}</td> --}}
                <td> {{ $adviserName}}</td>
                <td> {{ $archive->updated_at}}</td>
                @endforeach
        </tbody>
    </table>
    {{ $trnd->links() }}


</div>
@endsection