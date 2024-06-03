@extends('layout.dashboardLayout')

@section('title')
Anti-Plagiarism Dashboard
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white active" aria-current="true" href="{{ route('plagiarism.index') }}">
            <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
        </a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a class="nav-link text-white" href="{{ route('plagiarism.Archives') }}">
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
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-md-4">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Archives</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Archives Present in the system.</h6>
                        <h1 class="card-text">{{ $ttlArch }}</h1>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Number of students registered.</h6>
                        <h1 class="card-text">{{ $ttlStud }}</h1>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                        <h1 class="card-text">3</h1>

                    </div>
                </div>
            </div>
        </div>
        <h1>Most viewed archives</h1>
        <div class="row " style="margin-top: 1rem;">
            <div class="col-md-12">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Ranking</th>
                            <th scope="col">Archive ID</th>
                            <th scope="col">Group Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Department</th>

                            <th scope="col">Adviser</th>
                            <th scope="col">Date</th>
                            <th scope="col">View</th>
                            <th scope="col">Number of Views</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 0;

                        @endphp
                        @foreach ($viewss as $view)

                        <tr>
                            @php


                            $i = $i + 1;
                            $archive=\App\Models\TURNED_OVER_ARCHIVES::where('id', $view->TRND_ID)->first();
                            $adviserName=\App\Models\EMPLOYEE::where('EMP_ID', $archive->ADVISER_ID)->value("NAME");
                            $grp_name=\App\Models\group::where('id', $archive->GROUP_ID)->value("GRP_NAME");
                            $dept=\App\Models\department::where('id', $archive->DEPT_ID)->value("DEPT_NAME");

                            @endphp
                            @include('modal.ViewArch')

                            <td scope="row">
                                @if ($i==1)
                                <h2 style="text-align: center; color:gold;">{{$i}} <i class="fa-solid fa-crown"
                                        style="text-align: center; color:gold;"></i> </h2>
                                @elseif ($i==2)
                                <h2 style="text-align: center;color:silver;">{{$i}} <i class="fa-solid fa-crown"></i>
                                </h2>
                                @elseif ($i==3)
                                <h2 style="text-align: center;color:rgb(129, 83, 22);">{{$i}} <i
                                        class="fa-solid fa-crown"></i> </h2>
                                @endif
                            </td>
                            <td scope="row">
                                <a class="btn" href="#archView{{ $archive->ARCH_ID }}" data-bs-toggle="modal"
                                    onclick="incrementViewCount('{{ $archive->ARCH_ID }}')">
                                    {{ $archive->ARCH_ID }}
                                </a>

                            </td>
                            <td scope="row">
                                {{ $grp_name}}
                            </td>
                            <td scope="row">
                                <a class="btn" href="#archView{{ $archive->ARCH_ID }}" data-bs-toggle="modal"
                                    onclick="incrementViewCount('{{ $archive->ARCH_ID }}')">
                                    {{ $archive->TITLE }}
                                </a>
                            </td>
                            <td scope="row">
                                {{$dept}}
                            </td>


                            <td> {{ $adviserName}}</td>
                            <td> {{ $archive->updated_at}}</td>

                            <td scope="row">
                                <a class="btn" href="#archView{{ $archive->ARCH_ID }}" data-bs-toggle="modal"
                                    onclick="incrementViewCount('{{ $archive->id }}')">
                                    <i class="fa-solid fa-eye"></i></a>
                            </td>
                            <td>
                                <h4>{{ $view->VIEWS}}</h4>
                            </td>

                            <script>
                                function incrementViewCount(archiveId) {
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



                            <td scope="row">
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                                new MultiSelectTag("countries{{ $i }}");
                                            });
                                </script>
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