@extends('layout.dashboardLayout')

@section('title')
    Faculty Archives
@endsection

@section('topnav')
    <ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('faculty.index') }}">
                <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white active" aria-current="true" href="{{ route('faculty.myArchive') }}">
                <i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline">Archives</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white " href="{{ route('faculty.Checker') }}">
                <i class="fs-7 fa fa-check"></i><span class="fs-6 d-none ms-2 d-sm-inline">Checker</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white " href="{{ route('faculty.student') }}">
                <i class="fs-7 fa fa-user-graduate"></i><span class="fs-6 d-none ms-2 d-sm-inline">Student</span>
            </a>
        </li>
    </ul>
@endsection

@section('main')
    <div class="container" style="margin-left: 0;">
        <div class="row">
            <div class="col auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                    Add Archive
                </button>
            </div>
            <div class="col">
                <form action="{{ route('faculty.myArchive') }}" method="get">
                    <div class="input-group">

                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" name="search" />
                        <button type="submit" class="btn btn-outline-primary">Search</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Archive ID</th>
                <th scope="col">Archive Title</th>

                <th scope="col"> Documentation</th>
                <th scope="col"> GitHub Repository</th>
                <th scope="col"> View </th>
                <th scope="col"> Edit </th>

            </tr>
        </thead>
        <tbody> @php
            $i = 0;
        @endphp
            @foreach ($arch as $archive)
                <tr>
                    @php

                        $i = $i + 1;

                    @endphp
                    <td scope="row">{{ $archive->ARCH_ID }}</td>
                    <td scope="row">{{ $archive->ARCH_NAME }}</td>
                    <td scope="row"><a href="#"
                            onclick="openPDF('{{ asset('storage/pdfs/' . $archive->PDF_FILE) }}');">{{ $archive->PDF_FILE }}</a>
                    </td>
                    <td scope="row">{{ $archive->GITHUB_LINK }}</td>
                    <td scope="row"><a href="#archView{{ $archive->ARCH_ID }}" data-bs-toggle="modal"><i
                                class="fs-5 fa fa-eye"></i></a></td>
                    @include('modal.ViewArch')
                    <td scope="row">

                        <a href="#editA_{{ $archive->ARCH_ID }}" data-bs-toggle="modal">
                            <i class="fs-7 fa fa-pen-to-square"></i></a>






                        {{-- modal for edit archive --}}
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                new MultiSelectTag("countries{{ $i }}");
                            });
                        </script>
                        <div class="modal fade" id="editA_{{ $archive->ARCH_ID }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Archive update</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div> @php
                                        $auth = App\Models\STUDENT::where('ARCH_ID', $archive->ARCH_ID)->get();
                                    @endphp

                                    <div class="modal-body">

                                        <form class=""
                                            action="{{ route('faculty.updateArch', ['ARCH_ID' => $archive->ARCH_ID]) }}"
                                            method="POST" enctype="multipart/form-data">

                                            @csrf
                                            @method('PUT')

                                            <div class="mb-3">
                                                <label for="archID" class="form-label">Archive ID</label>
                                                <input type="text" class="form-control" placeholder="Enter Archive ID"
                                                    id="archID" name="ARCH_ID"
                                                    value="{{ old('ARCH_ID', $archive->ARCH_ID) }}" required>

                                            </div>

                                            <div class="mb-3">

                                                <label for="name" class="form-label">Archive name</label>
                                                <input class="form-control" type="text" name="ARCH_NAME"
                                                    value="{{ old('ARCH_NAME', $archive->ARCH_NAME) }}" id="name"
                                                    required>


                                            </div>


                                            <div class="mb-3">


                                                <div class="mb-3">
                                                    <label for="gh" class="form-label">GitHub Repository</label>
                                                    <input type="text" class="form-control" placeholder="Enter Link"
                                                        name="GITHUB_LINK" id="gh"
                                                        value="{{ old('GITHUB_LINK', $archive->GITHUB_LINK) }}">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="pdf_file" class="form-label">Current
                                                        Documentation</label><br>
                                                    <a class="form-control" href="#"
                                                        onclick="openPDF('{{ asset('storage/pdfs/' . $archive->PDF_FILE) }}');">{{ $archive->PDF_FILE }}</a>

                                                    <label for="pdf_file" class="form-label">Documentation</label>
                                                    <input type="file" id="pdf_file" name="pdf_file"
                                                        accept="application/pdf" value="{{ old('PDF_FILE') }}"
                                                        id="pdf" class="form-control">

                                                </div>

                                                <div class="dropdown">
                                                    <label for="Status" class="form-label">Status:</label>
                                                    <select id="stat" name="IS_APPROVED" class="form-select"
                                                        aria-label="Default select example">
                                                        <option value="approved">approved</option>
                                                        <option value="not approved">not approved</option>

                                                    </select>


                                                    <br>
                                                </div>

                                                <div class="form-floating">

                                                    <textarea class="form-control" placeholder="Leave a abstract here" name="ABSTRACT" rows="3">{{ old('ABSTRACT', $archive->ABSTRACT) }}</textarea>
                                                    <label for="floatingTextarea2">Abstract</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="form-label">Authors</label>
                                                    @foreach ($auth as $item)
                                                        <p class="form-control">{{ $item->S_ID }} ||
                                                            {{ $item->NAME }}</p>
                                                    @endforeach
                                                </div>
                                                <label for="Author" class="form-label">Author</label>

                                                <select name="countries[]" id="countries{{ $i }}" multiple>
                                                    @foreach ($auths as $archive)
                                                        <option value="{{ $archive->S_ID }}">{{ $archive->S_ID }} ||
                                                            {{ $archive->NAME }}</option>
                                                    @endforeach
                                                </select>




                                            </div>





                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Archive</button>
                                    </div>
                                    </form>
                                </div>
                            </div>


                        </div> {{-- end modal for edit archive --}}



                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $arch->links() }}



    {{-- modal for add archive --}}
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-7" id="exampleModalLabel">Archive add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class="" action="{{ route('faculty.storeArch') }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf


                        <div class="mb-3">
                            <label for="name" class="form-label">Archive Title</label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="name"
                                value="{{ old('name') }}" required>

                        </div>

                        <div class="mb-3">
                            <label for="Author" class="form-label">Author</label>

                            <select name="countries[]" id="countries" multiple>
                                @foreach ($auths as $archive)
                                    <option value="{{ $archive->S_ID }}">{{ $archive->S_ID }}</option>
                                @endforeach
                            </select>

                        </div>


                        <div class="mb-3">


                            <label for="pdf_file" class="form-label">Documentation</label>
                            <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf"
                                value="{{ old('pdf_file') }}" id="pdf" class="form-control">

                        </div>

                        <div class="mb-3">
                            <label for="pubYear" class="form-label">Year Published</label>
                            <input type="text" class="form-control" placeholder="Ex: June 2023" name="pubYear"
                                id="pubYear" value="{{ old('pubYear') }}">

                        </div>
                        <div class="mb-3">
                            <label for="gh" class="form-label">GitHub Repository</label>
                            <input type="text" class="form-control" placeholder="Enter Link" name="gh"
                                id="gh" value="{{ old('gh') }}">

                        </div>

                        <div class="dropdown">
                            <label for="Status" class="form-label">Status:</label>
                            <select id="stat" name="stat" class="form-select"
                                aria-label="Default select example">
                                <option value="approved">approved</option>
                                <option value="not approved">not approved</option>

                            </select>


                            <br>
                        </div>
                        <div class="form-floating">

                            <textarea class="form-control" placeholder="Leave a abstract here" name="abs" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Abstract</label>
                        </div>




                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Archive</button>
                </div>
                </form>
            </div>
        </div>



        <script>
            document.addEventListener("DOMContentLoaded", function() {
                new MultiSelectTag("countries");
            });
        </script>


    </div> {{-- end modal for add archive --}}
@endsection
