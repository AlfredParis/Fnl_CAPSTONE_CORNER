@extends('layout.dashboardLayout')

@section('title')
    Archive Table
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="inactive">Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="active">Archives</a>
    <a href="{{ route('admin.checker') }}" class="inactive">Checker</a>
    <a href="{{ route('admin.student') }}" class="inactive">Student</a>
    <a href="{{ route('admin.faculty') }}" class="inactive">Faculty</a>
    <a href="{{ route('admin.admin') }}" class="inactive">Admin</a>
@endsection
{{-- TODO: dapat naka display dito yung mga archives tapos may add button na nandoon yung form dapat nang add archives --}}
@section('main')
    <br>

    <div class="table-wrapper">
        <a href="{{ route('admin.addArch') }}" class="glowbtn">Add Archive</a>
        <br><br><br>
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Archive ID</th>
                    <th>Archive Title</th>
                    <th>Author/s</th>
                    <th> Documentation</th>
                    <th> GitHub Repository</th>
                    <th> View </th>
                    <th> Edit </th>
                    <th> Delete </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($arch as $archive)
                    <tr>

                        <td>{{ $archive->ARCH_ID }}</td>
                        <td>{{ $archive->ARCH_NAME }}</td>
                        <td>{{ $archive->ABSTRACT }}</td>
                        <td>{{ $archive->AUTHOR_ID }}</td>
                        <td><a href="#"
                                onclick="openPDF('{{ asset('storage/pdfs/' . $archive->PDF_FILE) }}');">{{ $archive->PDF_FILEPDF_FILE }}</a>
                        </td>
                        <td>{{ $archive->GITHUB_LINK }}</td>
                        <td><a href="/admin/{{ $archive->ARCH_ID }}" class="glowbtn">view</a></td>

                        <td><a href="{{ route('admin.editArch', ['ARCH_ID' => $archive->ARCH_ID]) }}"
                                class="glowbtn">edit</a></td>
                        <td>{{ $archive->AUTHOR_ID }}</td>
                        <td>{{ $archive->IS_APPROVED }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table><br>

    </div>

    <div class="lnk">
        {{ $arch->links() }}</div>
@endsection
