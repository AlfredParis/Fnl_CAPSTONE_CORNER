@extends('layout.dashboardLayout')

@section('title')
My Advisory
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
<div class="pddingForBody">
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

                        <tr>
                            @php
                            $isTurned=\App\Models\group::where('id', $archive->id)->value('STATUS_ID');
                            $stat=\App\Models\archStatus::where('id', $isTurned)->value('arch_stat');
                            $trnd=\App\Models\TURNED_OVER_ARCHIVES::where('GROUP_ID',$archive->id)->value('id');

                            @endphp

                            <td> {{ $archive->GRP_NAME}}</td>
                            <td> <a class="btn btn-primary"
                                    href="{{ route('faculty.myGroup',['advisory' => $archive->id]) }}">open</a>
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
</div>
@endsection