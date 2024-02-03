@extends('layout.dashboardLayout')

@section('title')
    Super Admin Dashboard
@endsection

@section('topnav')
    <ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white active" aria-current="true" href="{{ route('superAdmin.index') }}">
                <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('superAdmin.archives') }}">
                <i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline">Archives</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="#">
                <i class="fs-7 fa fa-check"></i><span class="fs-6 d-none ms-2 d-sm-inline">Checker</span>
            </a>
        </li>
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
            <a class="nav-link text-white" href="{{ route('superAdmin.adminTB') }}">
                <i class="fs-7 fa fa-user-gear"></i><span class="fs-6 d-none ms-2 d-sm-inline">Admin</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('superAdmin.audit') }}">
                <i class="fs-7 fa fa-clipboard"></i><span class="fs-6 d-none ms-2    d-sm-inline">Audit</span>
            </a>
        </li>
    </ul>
@endsection

@section('main')
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
                            <th scope="col">Archive ID</th>
                            <th scope="col">Archive Title</th>
                            <th scope="col"> Documentation</th>
                            <th scope="col"> GitHub Repository</th>

                            <th scope="col"> Views </th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;

                        @endphp
                        @foreach ($arch as $archive)
                            @include('modal.ViewArch')



                            <tr>
                                @php

                                    $i = $i + 1;

                                @endphp
                                <td scope="row">
                                    <a class="btn" href="#archView{{ $archive->ARCH_ID }}" data-bs-toggle="modal"
                                        onclick="incrementViewCount('{{ $archive->ARCH_ID }}')">
                                        {{ $archive->ARCH_ID }}</a>

                                </td>
                                <td scope="row">
                                    <a class="btn" href="#archView{{ $archive->ARCH_ID }}" data-bs-toggle="modal"
                                        onclick="incrementViewCount('{{ $archive->ARCH_ID }}')">
                                        {{ $archive->ARCH_NAME }}</a>
                                </td>
                                <td scope="row"><a href="#"
                                        onclick="openPDF('{{ asset('storage/pdfs/' . $archive->PDF_FILE) }}');">{{ $archive->PDF_FILE }}</a>
                                </td>
                                <td scope="row">{{ $archive->GITHUB_LINK }}</td>
                                <td scope="row">
                                    {{-- <a href="{{ route('superAdmin.viewCnt', ['ARCH_ID' => $archive->ARCH_ID]) }}"
                                            class="open-modal">
                                        --}}
                                    {{ $archive->viewCount }}
                                </td>

                                <script>
                                    function incrementViewCount(archiveId) {
                                        // Make an AJAX request to increment the view count
                                        $.ajax({
                                            url: `/superAdmin/viewCnt/${archiveId}`,
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
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_{{ $archive->id }}">
                                            EDIT Archive
                                        </button> --}}







                                    {{-- modal for edit archive --}}
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
@endsection
