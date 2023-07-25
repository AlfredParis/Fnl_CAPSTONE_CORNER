@extends('layout.dashboardLayout')

@section('title')
    Faculty Table
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="inactive">Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="inactive">Archives</a>
    <a href="{{ route('admin.checker') }}" class="inactive">Checker</a>
    <a href="{{ route('admin.student') }}" class="inactive">Student</a>
    <a href="{{ route('admin.faculty') }}" class="active">Faculty</a>
    <a href="{{ route('admin.admin') }}" class="inactive">Admin</a>
@endsection

@section('main')
    <br>


    <div class="table-wrapper">

        <table class="fl-table">
            <a href="{{ route('admin.addUser', ['user' => 'faculty']) }}" class="glowbtn">Add Faculty</a>

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
                @foreach ($faculty as $fac)
                    <tr>

                        <td>{{ $fac->userID }}</td>
                        <td>{{ $fac->fullname }}</td>
                        <td>{{ decrypt($fac->password) }}</td>
                        <td><a href="/usercc/{{ $fac->id }}" class="glowbtn">view</a></td>

                        <td><a href="{{ route('admin.edit', ['id' => $fac->id]) }}" class="glowbtn">edit</a></td>
                        <td>
                            <form action="/usercc/{{ $fac->id }}" method="POST">
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
    {{ $faculty->links() }}
@endsection
