@extends('layout.dashboardLayout')

@section('title')
My Advisory
@endsection

@section('topnav')

<ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" aria-current="true" href="{{ route('subAdmin.index') }}">
            <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('subAdmin.forProposal') }}">
            <i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline">For Proposal</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('subAdmin.forFinalDefense') }}">
            <i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline">For Final Defense</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('subAdmin.finalDefended') }}">
            <i class="fs-7 fa fa-users"></i><span class="fs-6 d-none ms-2 d-sm-inline">Final Defended</span>
        </a>
    </li>

    {{-- <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="#">
            <i class="fs-7 fa fa-check"></i><span class="fs-6 d-none ms-2 d-sm-inline">Checker</span>
        </a>
    </li> --}}
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white active" href="{{ route('subAdmin.advisory') }}">
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
<h1>My Advisories</h1>
<div class="container-fluid ">

    <div class="row " style="margin-top: 1rem;">
        <div class="col-md-12">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Group Name</th>
                        <th scope="col">Open Group</th>
                        <th scope="col">Ready for turn over</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;

                    @endphp
                    @foreach ($groups as $archive)
                    @php
                    $isTurned=\App\Models\group::where('id', $archive->id)->value('STATUS_ID');
                    $stat=\App\Models\archStatus::where('id', $isTurned)->value('arch_stat');
                    $trnd=\App\Models\TURNED_OVER_ARCHIVES::where('GROUP_ID',$archive->id)->value('id');

                    @endphp

                    <td> {{ $archive->GRP_NAME}}</td>
                    <td> <a class="btn btn-primary"
                            href="{{ route('subAdmin.myGroup',['advisory' => $archive->id]) }}">open</a>
                    </td>
                    <td>
                        @if ($isTurned==4)

                        @if (isset($trnd))

                        <p class="btn btn-outline-success">
                            Waiting For Response</p>

                        @else
                        <a class="btn btn-success" href="#turnOver_{{  $archive->id }}" data-bs-toggle="modal">
                            Turn Over</a>

                        @endif

                        @include('modal.turnOver')
                        @elseif ($isTurned==3)
                        <p class="btn btn-warning">{{ $stat }}</p>
                        @elseif ($isTurned==2)
                        <p class="btn btn-info">{{ $stat }}</p>
                        @else
                        <p class="btn btn-danger">{{ $stat }}</p>
                        @endif

                    </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>






        </div>
    </div>
</div>
@endsection