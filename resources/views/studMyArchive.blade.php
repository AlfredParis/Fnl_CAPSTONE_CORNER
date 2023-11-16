@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4 ">
    <li class="nav-item py-2 py-sm-0">
        <a href="{{ route('studentt.index') }}" class="nav-link text-white" ><i class="fs-7 fa fa-house"></i><span class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span></a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a href="{{ route('studentt.myArchive') }}" class="nav-link text-white active" aria-current="true"><i class="fs-7 fa fa-box-archive"></i><span class="fs-6 d-none ms-2 d-sm-inline">My Archive</span></a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a href="{{ route('studentt.Checker') }}" class="nav-link text-white"><i class="fs-7 fa fa-check"></i><span class="fs-6 d-none ms-2 d-sm-inline">Checker</span></a>
    </li>
</ul>
@endsection

@section('main')

        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addArch">
            Add Archive
        </button> --}}

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Archive ID</th>
                    <th scope="col">Archive Title</th>

                    <th scope="col"> Documentation</th>
                    <th scope="col"> Documentation</th>
                    <th scope="col"> GitHub Repository </th>
                    <th scope="col"> Views </th>
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
                        <td scope="row"><a href="/admin/{{ $archive->ARCH_ID }}" class="glowbtn">view</a></td>

                        <td scope="row"><a href="{{ route('admin.editArch', ['ARCH_ID' => $archive->ARCH_ID]) }}"
                                class="glowbtn">edit</a>
                        </td>
                        <td scope="row">{{ $archive->AUTHOR_ID }}</td>
                        {{-- <td>{{ $archive->IS_APPROVED }}</td> --}}

                    </tr>
                @endforeach
            </tbody>
        </table>
     {{ $arch->links() }}

@include('modal.studaddArch')

@endsection

