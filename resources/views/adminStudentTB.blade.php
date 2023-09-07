@extends('layout.dashboardLayout')

@section('title')
    Student Table
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="inactive">Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="inactive">Archives</a>
    <a href="{{ route('admin.checker') }}" class="inactive">Checker</a>
    <a href="{{ route('admin.student') }}" class="active">Student</a>
    <a href="{{ route('admin.faculty') }}" class="inactive">Faculty</a>
    <a href="{{ route('admin.admin') }}" class="inactive">Admin</a>
@endsection

@section('main')
    <br>
    <div class="table-wrapper">

        <table class="fl-table">
            <a href="{{ route('admin.addUser', ['user' => 'student']) }}" class="glowbtn">Add Student</a>

            <br><br><br>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Password</th>
                    <th> Views </th>
                    <th> Edit </th>
                    <th> Delete </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>

                        <td>{{ $student->userID }}</td>
                        <td>{{ $student->fullname }}</td>
                        <td>{{ decrypt($student->password) }}</td>
                        <td><a href="{{ route('admin.view', ['id' => $student->id]) }}" class="glowbtn view-link"
                                data-student-id="{{ $student->id }}">view</a>
                        </td>

                        <td><a href="{{ route('admin.edit', ['id' => $student->id]) }}" class="glowbtn">edit</a></td>
                        <td>
                            <form action="/usercc/{{ $student->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" name="sumbit" value="Delete" class="glowbtn">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $students->links() }}
@endsection
