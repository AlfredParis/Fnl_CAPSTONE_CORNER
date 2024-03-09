@extends('layout.dashboardLayout')

@section('title')
Archive Table
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
<div class="col auto">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#groupAdd">
        Make a group
    </button>

</div>
<div style="text-align: center; Margin-top:40vh;">
    <h1>You don't have a group yet. Make yours or wait for your leader to add you.</h1>
</div>

@include("studentModal.makeGroup")

@else



@php
$advicername= \App\Models\EMPLOYEE::where('EMP_ID', $GRP_det->ADVSR_ID)->first();
@endphp
{{ $advicername->NAME }} <br>
{{ $GRP_det->id }}

@endif


@endsection