@extends('layout.dashboardLayout')

@section('title')
    Archive Table
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="inactive">Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="actives">Archives</a>
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



        <br><br>
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Archive ID</th>
                    <th>Archive Title</th>

                    <th> Documentation</th>
                    <th> GitHub Repository</th>
                    <th> View </th>
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

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> {{ $arch->links() }}
@endsection
