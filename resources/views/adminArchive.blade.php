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
                    <th> GitHub Repository</th>
                    <th> View </th>
                    <th> Edit </th>
                    <th> Delete </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($arch as $archive)
                    <tr>

                        <td>{{ $archive->archID }}</td>
                        <td>{{ $archive->name }}</td>
                        <td>{{ $archive->author }}</td>
                        <td>{{ $archive->gh }}</td>
                        <td><a href="/admin/{{ $archive->id }}" class="glowbtn">view</a></td>

                        <td><a href="{{ route('admin.editArch', ['id' => $archive->id]) }}" class="glowbtn">edit</a></td>
                        <td>
                            <form action="{{ route('admin.delArch', ['id' => $archive->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" name="sumbit" value="Delete" class="glowbtn">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br>

    </div>

    <div class="lnk">
        {{ $arch->links() }}</div>
@endsection
