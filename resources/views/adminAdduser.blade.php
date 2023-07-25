@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    @if ($userAdd == 'admin')
        <a href="{{ route('admin.admin') }}" class="inactive">Return</a>
    @elseif($userAdd == 'faculty')
        <a href="{{ route('admin.faculty') }}" class="inactive">Return</a>
    @else
        <a href="{{ route('admin.student') }}" class="inactive">Return</a>
    @endif
@endsection

@section('main')
    <p class="text-style"> {{ $userAdd }} Add Form</p>
    <br>
    <br>
    <div class="container">
        <form class="" action="{{ route('admin.storeUser', ['userac' => $userAdd]) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="userID">User ID</label>
                <input type="text" class="form-control" placeholder="Enter ID" name="userID" value="{{ old('userID') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" placeholder="Full Name" name="fullname"
                    value="{{ old('fullname') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password" id="myInput"
                    value="{{ old('password') }}" required>
                <div class="showpass">
                    <input type="checkbox" onclick="myFunction()"> Show Password
                </div>
            </div>

            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password" name="conpassword" id="conpass"
                    value="{{ old('conpassword') }}" required>
                <div class="showpass">
                    <input type="checkbox" onclick="conPass()"> Show Password
                </div>
            </div>

            {{-- <label class="form-check-label" for="remember">Remember me</label>  <input type="checkbox" class="form-check-input" checked="checked" name="remember"> --}}

            <div style="text-align: center">
                <button type="submit" class="btn btn-primary">Register</button>
                <br>
                {{-- <div class="form-group" style="background-color:#f1f1f1"> --}}


                <span class="psw">Forgot <a href="#">password?</a></span>
                {{-- </div> --}}

        </form>
    </div>
    </div>
@endsection
