@extends('layout.dashboardLayout')

@section('title')
My Group
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4 gap-1">
    <li class="nav-item py-2 py-sm-0">
        <a href="{{ route('studentt.index') }}" class="nav-link text-white " aria-current="true"><i
                class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span></a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a href="{{ route('studentt.group') }}" class="nav-link text-white active"><i
                class="fs-7 fa fa-user-group"></i><span class="fs-6 d-none ms-2 d-sm-inline">Group</span></a>
    </li>

    <li class="nav-item py-2 py-sm-0">
        <a href="{{ route('studentt.Checker') }}" class="nav-link text-white"><i class="fs-7 fa fa-check"></i><span
                class="fs-6 d-none ms-2 d-sm-inline">Checker</span></a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a href="{{ route('studentt.archives') }}" class="nav-link text-white"><i class="fs-7 fa fa-book"></i><span
                class="fs-6 d-none ms-2 d-sm-inline">archives</span></a>
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
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="margin-left:-10px; position:fixed; Top:0; width:90vw;">
    <div class="container-fluid">
        <h6 class="group-nav-content"> {{ $GRP_det->GRP_NAME }} </h6>
        <h6 class="group-nav-content"> Adviser: {{ $advicername->NAME }}</h6>
        <h6 class="group-nav-content"> Status: {{ $stat }}</h6>
        <button type="button" data-bs-toggle="modal" data-bs-target="#abs{{$GRP_det->id}}"
            style="border:none;background-color:rgba(0, 0, 255, 0); color:aliceblue; padding-left:20px;">
            Abstract</button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown"
            aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown" style="width:30vw;">
                    <button s class=" btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Group Members
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        @foreach ( $mmbrs as $mmbr)
                        <li style="padding-left:10px; padding-right:10px; width:auto; ">
                            <form class="" action="{{route('studentt.removeMem', ['S_ID' => $mmbr->S_ID])}}"
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
                        <li> <button type="button" data-bs-toggle="modal" data-bs-target="#memAdd"
                                style="border:none;background-color:rgba(0, 0, 255, 0); color:aliceblue; padding-left:20px;">
                                Add member</button></li>

                    </ul>

                </li>
            </ul>
        </div>

    </div>

</nav>

<div class="pddingForBody">
    @include('studentModal.addMember')
    @include('modal.abstract')
    <div style="margin-top: 60px; margin-bottom: 10vh;">

        <table class="table table-striped">
            <div>
                <thead>
                    <tr>
                        <th scope="col">Version</th>
                        <th scope="col">Uploader</th>
                        <th scope="col">Description</th>
                        <th scope="col"> Pdf</th>



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
                            class="btn btn-primary">Open Document</a>
                    </td>
                    <td> <a class="btn btn-primary" href="#comment{{ $oparch->id }}" data-bs-toggle="modal">Comments</a>
                    </td>
                    @include('studentModal.addComment')
                </tr>
                @endforeach



            </tbody>
        </table>
        @include("studentModal.addArchive")
    </div>
</div>

<form class="" action="{{ route('studentt.opArch') }}" method="POST" enctype="multipart/form-data">

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