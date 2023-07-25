@extends('layout.dashboardLayout')

@section('title')
    Admin Table
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="inactive">Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="inactive">Archives</a>
    <a href="{{ route('admin.checker') }}" class="inactive">Checker</a>
    <a href="{{ route('admin.student') }}" class="inactive">Student</a>
    <a href="{{ route('admin.faculty') }}" class="inactive">Faculty</a>
    <a href="{{ route('admin.admin') }}" class="active">Admin</a>
@endsection

@section('main')
    <br>


    <div class="table-wrapper">

        <table class="fl-table">
            <a href="{{ route('admin.addUser', ['user' => 'admin']) }}" class="glowbtn">Add admin</a>

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
                @foreach ($admin as $adm)
                    <tr>

                        <td>{{ $adm->userID }}</td>
                        <td>{{ $adm->fullname }}</td>
                        <td>{{ decrypt($adm->password) }}</td>
                        <td><a href="/usercc/{{ $adm->id }}" class="glowbtn">view</a></td>

                        <td><a href="{{ route('admin.edit', ['id' => $adm->id]) }}" class="glowbtn">edit</a></td>
                        <td>
                            <form action="/usercc/{{ $adm->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" name="sumbit" value="Delete" class="glowbtn">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $admin->links() }}
    </div>
@endsection
