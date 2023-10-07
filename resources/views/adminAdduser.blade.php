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
    <p class="text-style"> {{ $userAdd }} Add Form</p>
    <br>
    <br>
    <div class="container">
        <form class="" action="{{ route('admin.storeEmp', ['user' => $userAdd]) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="userID"> {{ $userAdd }} ID</label>
                <input type="text" class="form-control" placeholder="Enter ID" name="userID" value="{{ old('userID') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="fullname"> {{ $userAdd }} name</label>
                <input type="text" class="form-control" placeholder="{{ $userAdd }} name" name="fullname"
                    value="{{ old('fullname') }}" required>
            </div>
            @if ($userAdd == 'student')
                <div class="form-group">
                    <label for="C_ID">Course ID</label>
                    <input type="text" class="form-control" placeholder="Enter 1 for BSIT" name="C_ID"
                        value="{{ old('C_ID') }}" required>
                </div>
            @else
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="PASSWORD" id="myInput"
                        value="{{ old('PASSWORD') }}" required>
                </div>
                {{-- <div class="form-group">
                    <label for="password">Course ID</label>
                    <input type="password" class="form-control" placeholder="Enter 1 for BSIT" name="password"
                        id="myInput" value="{{ old('password') }}" required>
                </div> --}}
            @endif
            {{-- <div class="showpass">
                    <input type="checkbox" onclick="myFunction()"> Show Password
                </div> --}}
    </div>

    {{-- <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password" name="conpassword" id="conpass"
                    value="{{ old('conpassword') }}" required>
                <div class="showpass">
                    <input type="checkbox" onclick="conPass()"> Show Password
                </div>
            </div> --}}

    <div style="text-align: center">
        <button type="submit" class="btn btn-primary">Register</button>
        <br>

        {{-- <span class="psw">Forgot <a href="#">password?</a></span> --}}


        </form>
    </div>
    </div>
@endsection
