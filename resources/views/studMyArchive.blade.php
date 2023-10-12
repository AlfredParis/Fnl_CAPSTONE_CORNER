@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
    <a href="{{ route('studentt.index') }}" class="inactive">dashboard</a>
    <a href="{{ route('studentt.myArchive') }}" class="actives">My Archive</a>
    <a href="{{ route('studentt.Checker') }}" class="inactive">Checker</a>
@endsection

@section('main')
    <br>

    <div class="table-wrapper">
        <a href="{{ route('studentt.addArch') }}" class="glowbtn">Add Archive</a>



        <br><br>
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Archive ID</th>
                    <th>Archive Title</th>

                    <th> Documentation</th>
                    <th> Documentation</th>
                    <th> GitHub Repository </th>
                    <th> Views </th>
                    <th> Edit </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($arch as $archive)
                    <tr>

                        <td>{{ $archive->ARCH_ID }}</td>
                        <td>{{ $archive->ARCH_NAME }}</td>
                        <td><a href="#"
                                onclick="openPDF('{{ asset('storage/pdfs/' . $archive->PDF_FILE) }}');">{{ $archive->PDF_FILE }}</a>
                        </td>
                        <td>{{ $archive->GITHUB_LINK }}</td>
                        <td><a href="/admin/{{ $archive->ARCH_ID }}" class="glowbtn">view</a></td>

                        <td><a href="{{ route('admin.editArch', ['ARCH_ID' => $archive->ARCH_ID]) }}"
                                class="glowbtn">edit</a>
                        </td>
                        <td>{{ $archive->AUTHOR_ID }}</td>
                        {{-- <td>{{ $archive->IS_APPROVED }}</td> --}}

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> {{ $arch->links() }}
@endsection
