@extends('layout.dashboardLayout')

@section('title')
    Student Table
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="inactive">Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="inactive">Archives</a>
    <a href="{{ route('admin.checker') }}" class="inactive">Checker</a>
    <a href="{{ route('admin.student') }}" class="actives">Student</a>
    <a href="{{ route('admin.faculty') }}" class="inactive">Faculty</a>
    <a href="{{ route('admin.admin') }}" class="inactive">Admin</a>
@endsection

@section('main')
    {{-- <div class="top-left-anchor">


        <form action="{{ route('admin.import.excel') }}" method="POST" enctype="multipart/form-data">
            @csrf



            <input type="file" style=" margin-left: 1%;" name="excel_file" id="excel_file" accept=".xlsx, .xls" required>

            <br> <br>
            <button type="submit" class="glowbtn">Import Excel Student</button>

        </form>
    </div> --}}


    <div class="table-wrapper">

        <table class="fl-table"><br>
            <a href="{{ route('admin.addUser', ['user' => 'student']) }}" class="glowbtn">Add Student</a>



            <br><br><br>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Password</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($SN as $student)
                    <tr>

                        <td>{{ $student->S_ID }}</td>
                        <td>{{ $student->NAME }}</td>
                        <td>{{ $student->C_DESC }}</td>
                        <td><a href="/usercc/{{ $student->S_ID }}" class="glowbtn">view</a></td>

                        <td><a href="{{ route('admin.edit', ['USER_ID_EMP' => $student->S_ID]) }}" class="glowbtn">edit</a>
                        </td>




                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $SN->links() }}
@endsection
