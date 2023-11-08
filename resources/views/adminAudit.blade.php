@extends('layout.dashboardLayout')

@section('title')
    Student Table
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="inactive">Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="inactive">Archives</a>
    <a href="{{ route('admin.checker') }}" class="inactive">Checker</a>
    <a href="{{ route('admin.student') }}" class="inactives">Student</a>
    <a href="{{ route('admin.faculty') }}" class="inactive">Faculty</a>
    <a href="{{ route('admin.admin') }}" class="inactive">Admin</a>
    <a href="{{ route('admin.audit') }}" class="active">Audit</a>
@endsection

@section('main')
<br>

    <div class="table-wrapper">

        <table class="fl-table"><br>

            <br><br><br>
            <thead>
                <tr><th>Date</th>
                    <th>category</th>
                    <th>Message</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($notif as $not)
                    <tr>
                        <td >{{ $not->created_at }}</td>
                        <td >{{ $not->category }}</td>
                        <td >{{ $not->content }}</td>







                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $notif->links() }}
@endsection
