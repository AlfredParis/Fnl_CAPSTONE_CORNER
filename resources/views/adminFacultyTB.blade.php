@extends('layout.dashboardLayout')

@section('title')
    Faculty Table
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="inactive">Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="inactive">Archives</a>
    <a href="{{ route('admin.checker') }}" class="inactive">Checker</a>
    <a href="{{ route('admin.student') }}" class="inactive">Student</a>
    <a href="{{ route('admin.faculty') }}" class="actives">Faculty</a>
    <a href="{{ route('admin.admin') }}" class="inactive">Admin</a>
    <a href="{{ route('admin.audit') }}" class="active">Audit</a>
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
                    {{-- <th> Delete </th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($faculty as $fac)
                    <tr>

                        <td>{{ $fac->EMP_ID }}</td>
                        {{-- <td>{{ $fac-> }}</td> --}}

                        <td>{{ $fac->NAME }}</td>
                        <td>{{ decrypt($fac->PASSWORD) }}</td>
                        <td><a href="/usercc/{{ $fac->USER_ID_EMP }}" class="glowbtn">view</a></td>

                        <td><a href="{{ route('admin.edit', ['USER_ID_EMP' => $fac->EMP_ID]) }}" class="glowbtn">edit</a>
                        </td>
                        {{-- <td>
                            <form action="/usercc/{{ $fac->USER_ID_EMP }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" name="sumbit" value="Delete" class="glowbtn">
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $faculty->links() }}
@endsection
