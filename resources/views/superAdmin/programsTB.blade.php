@extends('layout.dashboardLayout')

@section('title')
    progs Table
@endsection

@section('topnav')
    <ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('superAdmin.index') }}">
                <i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white " aria-current="true" href="{{ route('superAdmin.archives') }}">
                <i class="fs-7 fa fa-box-progs"></i><span class="fs-6 d-none ms-2 d-sm-inline ">archives</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('superAdmin.index') }}">
                <i class="fs-7 fa fa-check"></i><span class="fs-6 d-none ms-2 d-sm-inline">Checker</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('superAdmin.student') }}">
                <i class="fs-7 fa fa-user-graduate"></i><span class="fs-6 d-none ms-2 d-sm-inline">Student</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white active" href="{{ route('superAdmin.index') }}">
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
    @endsection
    {{-- TODO: dapat naka display dito yung mga progss tapos may add button na nandoon yung form dapat nang add progss --}}
    @section('main')
        {{-- <a href="{{ route('superAdmin.addArch') }}" class="btn btn-primary">Add progs</a> --}}
        <h1>PROGRAMS</h1>

        <div class="container" style="margin-left: 0;">
            <div class="row">
                <div class="col auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        Add Program
                    </button>
                </div>

            </div>
        </div>

        <br>

        <div class="container overflow-hidden text-center">
            <div class="row gy-5">

                @php
                    $i = 0;

                @endphp
                @foreach ($prog as $progs)
                    <div class="col-6">

                        {{-- @include('modal.ViewArch') --}}
                        @php
                            $i = $i + 1;
                        @endphp
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $progs->id }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $progs->PROG_NAME }}</h6>
                                <p class="card-text">Some quick example .</p>
                                <a href="#archView{{ $progs->id }}" data-bs-toggle="modal"><i class="fs-5 fa fa-eye">
                                    </i> </a>
                                <td scope="row">
                                    <a href="#edit_{{ $progs->id }}" data-bs-toggle="modal">
                                        <i class="fs-5 fa fa-pen-to-square"></i></a>

                            </div>


                            {{-- modal for edit progs --}}

                            <div class="modal fade" id="edit_{{ $progs->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">progs
                                                update
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div> @php
                                            $auth = App\Models\program::where('id', $progs->id)->get();
                                        @endphp

                                        <div class="modal-body">

                                            <form class=""
                                                action="{{ route('superAdmin.updateProg', ['id' => $progs->id]) }}"
                                                method="POST" enctype="multipart/form-data">

                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="archID" class="form-label">progs
                                                        ID</label>
                                                    <p type="text" class="form-control">
                                                        {{ $progs->id }} </p>

                                                </div>

                                                <div class="mb-3">

                                                    <label for="name" class="form-label">progs
                                                        name</label>
                                                    <input class="form-control" type="text" name="ARCH_NAME"
                                                        value="{{ old('ARCH_NAME', $progs->ARCH_NAME) }}" id="name"
                                                        required>


                                                </div>


                                                <div class="mb-3">


                                                    <div class="mb-3">
                                                        <label for="gh" class="form-label">GitHub
                                                            Repository</label>
                                                        <input type="text" class="form-control" placeholder="Enter Link"
                                                            name="GITHUB_LINK" id="gh"
                                                            value="{{ old('GITHUB_LINK', $progs->GITHUB_LINK) }}">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="pdf_file" class="form-label">Current
                                                            Documentation</label>
                                                        <a class="form-control" href="#"
                                                            onclick="openPDF('{{ asset('storage/pdfs/' . $progs->PDF_FILE) }}');">{{ $progs->PDF_FILE }}</a>

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
                                                            <option value="not approved">not approved
                                                            </option>

                                                        </select>


                                                        <br>
                                                    </div>

                                                    <div class="form-floating">

                                                        <textarea class="form-control" placeholder="Leave a abstract here" name="ABSTRACT" rows="3">{{ old('ABSTRACT', $progs->ABSTRACT) }}</textarea>
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

                                                    <select name="countries[]" id="countries{{ $i }}"
                                                        multiple>
                                                        @foreach ($prog as $progs)
                                                            <option value="{{ $progs->S_ID }}">
                                                                {{ $progs->S_ID }} ||
                                                                {{ $progs->NAME }}</option>
                                                        @endforeach
                                                    </select>




                                                </div>





                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update
                                                progs</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>


                            </div>




                            </td>

                            </tr>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>


        {{-- modal for add progs --}}
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">progs add</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form class="" action="{{ route('superAdmin.storeArch') }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf


                            <div class="mb-3">
                                <label for="name" class="form-label">progs Title</label>
                                <input type="text" class="form-control" placeholder="Enter Title" name="name"
                                    value="{{ old('name') }}" required>

                            </div>

                            <div class="mb-3">
                                <label for="Author" class="form-label">Authors</label>

                                <select name="countries[]" id="countries" multiple>
                                    @foreach ($prog as $progs)
                                        <option value="{{ $progs->S_ID }}">{{ $progs->S_ID }}</option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="mb-3">


                                <label for="pdf_file" class="form-label">Documentation</label>
                                <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf"
                                    value="{{ old('pdf_file') }}" id="pdf" class="form-control">

                            </div>

                            <div class="mb-3">
                                <label for="pubYear" class="form-label">Approved Year</label>
                                <input type="text" class="form-control" placeholder="Ex: JUNE 2023" name="pubYear"
                                    value="{{ old('pubYear') }}" required>

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
                        <button type="submit" class="btn btn-primary">Add progs</button>
                    </div>
                    </form>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    new MultiSelectTag("countries");
                });
            </script>




        </div> {{-- end modal for add progs --}}
    @endsection
