@extends('layout.dashboardLayout')

@section('title')
Substitute Admin Dashboard
@endsection

@section('topnav')

<ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " aria-current="true" href="{{ route('subAdmin.index') }}">
            <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('subAdmin.forProposal') }}
">
            <i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline">For Proposal</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white active" href="{{route('subAdmin.forFinalDefense')}}">
            <i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline">For Final Defense</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('subAdmin.finalDefended') }}">
            <i class="fs-7 fa fa-users"></i><span class="fs-6 d-none ms-2 d-sm-inline">Final Defended</span>
        </a>
    </li>
    {{--
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="#">
            <i class="fs-7 fa fa-check"></i><span class="fs-6 d-none ms-2 d-sm-inline">Checker</span>
        </a>
    </li> --}}
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('subAdmin.advisory') }}">
            <i class="fs-7 fa fa-user-graduate"></i><span class="fs-6 d-none ms-2 d-sm-inline">My Advisory</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('subAdmin.finalized') }}">
            <i class="fs-7 fa fa-user-graduate"></i><span class="fs-6 d-none ms-2 d-sm-inline">Finalized</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('subAdmin.archives') }}">
            <i class="fs-7 fa fa-user-graduate"></i><span class="fs-6 d-none ms-2 d-sm-inline">Archives</span>
        </a>
    </li>
</ul>
@endsection

@section('main')
<h1>For Final Defense</h1>
<div class="container-fluid ">

    <div class="row " style="margin-top: 1rem;">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Group Name</th>
                        <th scope="col">Adviser Name</th>
                        <th scope="col">Date</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;

                    @endphp
                    @foreach ($groups as $archive)
                    @php
                    $adviserName=\App\Models\EMPLOYEE::where('EMP_ID', $archive->ADVSR_ID)->value("NAME");
                    @endphp
                    <tr>
                        @php
                        $i = $i + 1;
                        @endphp
                        <td> {{ $archive->GRP_NAME}}</td>
                        {{-- <td> <a class="btn btn-primary"
                                href="{{ route('faculty.myGroup',['advisory' => $archive->id]) }}">open</a> </td> --}}
                        <td> {{ $adviserName}}</td>
                        <td> {{ $archive->updated_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection