@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    @if ($userAdd == 'admin')
        <a href="{{ route('admin.admin') }}" class="inactive">Return</a>
    @elseif($userAdd == 'faculty')
        <a href="{{ route('admin.faculty') }}" class="inactive">Return</a>
    @elseif($userAdd == 'student')
        <a href="{{ route('admin.student') }}" class="inactive">Return</a>
    @endif
@endsection

@section('main')
<br> <br> <br>  <br>
<div style="overflow: hidden;">
    <p class="text-style"> {{ $userAdd }} Add Form</p>
    @if ($userAdd == 'student')
        <div class="top-left-anchor">

            <form action="{{ route('admin.import.excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" style=" margin-left: 1%;" name="excel_file" id="excel_file" accept=".xlsx, .xls"
                    required>
                <br> <br>
                <button type="submit" class="glowbtn">Import Excel Student</button>

            </form>
        </div>
    @elseif ($userAdd == 'admin')
    @else
    @endif


    <form action="{{ route('admin.storeEmp', ['user' => $userAdd]) }}" method="POST">
        <div class="checker">

            <div class="frm">
                <div class="chkContainier">

                    @csrf

                    <div class="formGroup">
                        <label for="userID"> {{ $userAdd }} ID</label>
                        <input type="text" class="formControl" placeholder="Enter ID" name="userID"
                            value="{{ old('userID') }}" required>
                    </div>

                    <div class="formGroup">
                        <label for="fullname"> {{ $userAdd }} name</label>
                        <input type="text" class="formControl" placeholder="{{ $userAdd }} name" name="fullname"
                            value="{{ old('fullname') }}" required>
                    </div>

                    {{-- <div class="formGroup">
                        <label for="user_input"> Archive ID</label>
                        <input class="formControl" type="text" name="user_input" id="user_input">
                    </div> --}}
                    @if ($userAdd == 'student')

                        <div class="formGroup">
                            <label for="fullname"> Archive ID</label>
                            <input type="text" class="formControl" placeholder="archive id" name="ARCH_ID"
                                value="{{ old('ARCH_ID') }}">
                        </div>
                    @else
                        <div class="formGroup">
                            <label for="password">Password</label>
                            <input type="password" class="formControl" placeholder="Password" name="PASSWORD" id="myInput"
                                value="{{ old('PASSWORD') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    @endif


                </div>

            </div>
            <div class="check">
                @if ($userAdd == 'student')
                    <div class="formGroup">
                        <br>
                        <label for="password">Student Password</label>
                        <input type="password" class="formControl" placeholder="Enter student password" name="PASSWORD"
                            id="myInput" value="{{ old('PASSWORD') }}" required>
                    </div>
                    <div class="showpass">
                        <input type="checkbox" onclick="myFunction()"> Show Password
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                @else
                @endif

            </div>

        </div>

    </form>
    </div>
</div>
@endsection
