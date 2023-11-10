@extends('layout.dashboardLayout')

@section('title')
    Archive Table
@endsection

@section('topnav')
    <ul class="nav nav-pills flex-column mt-4">
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('admin.index') }}">
                <i class="fs-5 fa fa-house"></i><span class="fs-4 d-none ms-2 d-sm-inline">Dashboard</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white active" aria-current="true" href="{{ route('admin.archives') }}">
                <i class="fs-5 fa fa-box-archive"></i><span class="fs-4 d-none ms-2 d-sm-inline ">Archives</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('admin.checker') }}">
                <i class="fs-5 fa fa-check"></i><span class="fs-4 d-none ms-2 d-sm-inline">Checker</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('admin.student') }}">
                <i class="fs-5 fa fa-user-graduate"></i><span class="fs-4 d-none ms-2 d-sm-inline">Student</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('admin.faculty') }}">
                <i class="fs-5 fa fa-users"></i><span class="fs-4 d-none ms-2 d-sm-inline">Faculty</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('admin.admin') }}">
                <i class="fs-5 fa fa-user-gear"></i><span class="fs-4 d-none ms-2 d-sm-inline">Admin</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('admin.audit') }}">
                <i class="fs-5 fa fa-clipboard"></i><span class="fs-4 d-none ms-2    d-sm-inline">Audit</span>
            </a>
        </li>
    @endsection
    {{-- TODO: dapat naka display dito yung mga archives tapos may add button na nandoon yung form dapat nang add archives --}}
    @section('main')


        {{-- <a href="{{ route('admin.addArch') }}" class="btn btn-primary">Add Archive</a> --}}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            Add Archive
        </button>



        <br><br>
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
            <tbody>
                @foreach ($arch as $archive)
                    <tr>

                        <td scope="row">{{ $archive->ARCH_ID }}</td>
                        <td scope="row">{{ $archive->ARCH_NAME }}</td>
                        <td scope="row"><a href="#"
                                onclick="openPDF('{{ asset('storage/pdfs/' . $archive->PDF_FILE) }}');">{{ $archive->PDF_FILE }}</a>
                        </td>
                        <td scope="row">{{ $archive->GITHUB_LINK }}</td>
                        <td scope="row"><a href="/admin/{{ $archive->ARCH_ID}}"><i class="fs-5 fa fa-eye"></i></a></td>

                        <td scope="row">
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_{{ $archive->id }}">
                                EDIT Archive
                            </button> --}}
                            <a href="#edit_{{ $archive->ARCH_ID }}" data-bs-toggle="modal" >
                                <i class="fs-5 fa fa-pen-to-square"></i></a>






        {{-- modal for edit archive --}}
        <div class="modal fade" id="edit_{{  $archive->ARCH_ID  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Archive update</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="" action="{{ route('admin.updateArch', ['ARCH_ID' => $archive->ARCH_ID]) }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="archID" class="form-label">Archive ID</label>
                                <input type="text" class="form-control" placeholder="Enter Archive ID" id="archID"
                                    name="ARCH_ID" value="{{ old('ARCH_ID', $archive->ARCH_ID)}}" required>

                            </div>

                            <div class="mb-3">

                                <label for="name" class="form-label">Archive name</label>
                                <input class="form-control" type="text" name="ARCH_NAME"
                                    value="{{ old('ARCH_NAME', $archive->ARCH_NAME) }}" id="name" required>


                            </div>


                            <div class="mb-3">


                                {{-- <label for="pdf_file" class="form-label">Documentation</label>
                                <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf"
                                    value="{{ old('pdf_file') }}" id="pdf" class="form-control"> --}}

                            </div>


                            <div class="mb-3">
                                <label for="gh" class="form-label">GitHub Repository</label>
                                <input type="text" class="form-control" placeholder="Enter Link" name="GITHUB_LINK"
                                    id="gh" value="{{ old('GITHUB_LINK', $archive->GITHUB_LINK) }}">

                            </div>
                            <div class="mb-3">

                                <p>{{ old('PDF_FILE') }}</p>
                                <label for="pdf_file" class="form-label">Documentation</label>
                                <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf"
                                    value="{{ old('PDF_FILE') }}" id="pdf" class="form-control">

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

                                <textarea class="form-control" placeholder="Leave a abstract here" name="ABSTRACT" id="floatingTextarea2"
                                    rows="3">{{ old('ABSTRACT', $archive->ABSTRACT) }}</textarea>
                                <label for="floatingTextarea2">Abstract</label>
                            </div>



                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Archive</button>
                            </div>
                        </form>
                    </div>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Archive add</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="" action="{{ route('admin.storeArch') }}" method="POST"
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






        </div> {{-- end modal for add archive --}}


        <script>
            new MultiSelectTag('countries') // id
        </script>

    @endsection








