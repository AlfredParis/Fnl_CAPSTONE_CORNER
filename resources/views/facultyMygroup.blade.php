@extends('layout.dashboardLayout')

@section('title')
My Group
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " aria-current="true" href="{{ route('faculty.index') }}">
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
    {{-- <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white " href="{{ route('faculty.student') }}">
            <i class="fs-7 fa fa-user-graduate"></i><span class="fs-7 d-none ms-2 d-sm-inline">Student</span>
        </a>
    </li> --}}
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white active" aria-current="true" href="{{ route('faculty.advisory') }}">
            <i class="fs-7 fa fa-users-rectangle"></i><span class="fs-7 d-none ms-2 d-sm-inline">Advisory</span>
        </a>
    </li>
</ul>
@endsection

@section('main')

@if ($isGrouped == 'N/A')
<div class="pddingForBody">
    <div class="col auto">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#groupAdd">
            Make a group
        </button>

    </div>
    <div style="text-align: center; Margin-top:40vh;">
        <h1>You don't have a group yet. Make yours or wait for your leader to add you.</h1>
    </div>
</div>
@include("studentModal.makeGroup")

@else
@php

$advicername= \App\Models\EMPLOYEE::where('EMP_ID', $GRP_det->ADVSR_ID)->first();
$mmbrs= \App\Models\STUDENT::where('GROUP_ID', $GRP_det->id)->Get();
$stat=\App\Models\archStatus::where('id', $GRP_det->STATUS_ID)->value("arch_stat");
$allStat=\App\Models\archStatus::get() ;
@endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="margin-left:-10px; position:fixed; Top:0; width:90vw;">
    <div class="container-fluid">
        <h6 class="group-nav-content"> {{ $GRP_det->GRP_NAME }}</h6>
        <h6 class="group-nav-content"> Adviser: {{ $advicername->NAME }}</h6>
        <h6 class="group-nav-content"> Status: {{$stat }} </h6>

        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown" style="">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <button style="" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Group Members
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        @foreach ( $mmbrs as $mmbr)
                        <li style="padding-left:10px; padding-right:10px;">
                            <form class="" action="{{route('faculty.removeMem', ['S_ID' => $mmbr->S_ID])}}"
                                method="POST" enctype="multipart/form-data">
                                {{$mmbr->NAME}}
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    style="position:absolute; border:none; background-color:rgba(0, 0, 255, 0); color:aliceblue;  right:1px;">
                                    <i class="fs-7 fa fa-trash"></i></button>

                            </form>
                        </li>
                        @endforeach
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li> <button type="button" data-bs-toggle="modal" data-bs-target="#memAdd{{$GRP_det->id}}"
                                class="btn-noDesign">
                                Add member</button></li>

                    </ul>

                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown" style="width:15vw;">
                    <button style="width:10vw;" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Change Status
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        @foreach ( $allStat as $mmbr)
                        <li class="btn-noDesign">

                            <a class="btn-noDesign"
                                href="{{ route('updateProg', ['S_ID' => $mmbr->id, 'G_ID' => $GRP_det->id]) }}">
                                {{$mmbr->arch_stat}}</a>

                        </li>
                        @endforeach

                    </ul>

                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="pddingForBody">
    @include('facultyModal.addMember')
    <div style="margin-top: 60px; margin-bottom: 10vh; ">

        <table class="table table-striped">
            <div>
                <thead>
                    <tr>
                        <th scope="col">Version</th>
                        <th scope="col">Uploader</th>
                        <th scope="col">Description</th>
                        <th scope="col"> Pdf</th>
                        <th scope="col"> Comment</th>
                        <th scope="col"> Date</th>



                    </tr>
                </thead>
            </div>
            <tbody>
                @foreach ( $arch as $oparch)
                <tr>
                    <td scope="row">{{$oparch->ARCH_NAME}} </td>
                    <td scope="row">{{$oparch->UPLOADER}}</td>
                    <td scope="row">{{$oparch->DESCRIPTION}}</td>
                    <td scope="row">
                        <a href="#" onclick="openPDF('{{ asset('storage/pdfs/' . $oparch->PDF_FILE) }}');"
                            class="btn btn-primary">Open Document </a>
                    </td>
                    <td> <a class="btn btn-primary" href="#comment{{ $oparch->id }}" data-bs-toggle="modal">Comments</a>
                    </td>
                    <td scope="row">{{$oparch->created_at}}</td>

                    @include('facultyModal.addComment')
                </tr>
                @endforeach



            </tbody>
        </table>

    </div>
</div>

<form class="" action="{{ route('opArchGL',['grp_id'=>$GRP_det->id]) }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="bottom">


        <div class=" mesDes">
            <input type="text" class="form-control" placeholder="Description Here" name="DESCRIPTION"
                value="{{ old('DESCRIPTION') }}" required>
        </div>
        <div class="mesFile">
            <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" value="{{ old('PDF_FILE') }}"
                id="pdf" class="form-control">
        </div>
        <div class="mesSave">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>


    </div>
</form>


@endif

@endsection