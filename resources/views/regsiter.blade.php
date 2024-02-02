@extends('layout.homeLayout')

@section('title')
    Regsiter
@endsection

@section('topnav')
    <a href="{{ route('root') }}" class="inactive">login</a>
    <a href="{{ route('userCC.create') }}" class="active">regsiter</a>
@endsection

@section('main')
    <i class="fa-brands fa-creative-commons-by"></i>
    <div class="container">



        <form action="{{ route('userCC.store') }}" method="POST">
            @csrf

            {{-- <div class="form-group">
                <label for="userID">User ID</label>
                <input type="text" class="form-control" placeholder="Enter ID" name="userID" value="{{ old('userID') }}"
                    required>
            </div> --}}

            <div class="form-group">
                <label for="S_ID">Student ID</label>
                <input type="text" class="form-control" placeholder="Student ID" name="S_ID"
                    value="{{ old('S_ID') }}" required>
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
            </div>
            {{-- <div class="form-group" style="background-color:#f1f1f1"> --}}


            {{-- <span class="psw">Forgot <a href="#">password?</a></span> --}}

            <div class="line">or</div>
            <br>
            {{-- <span class="psw">Forgot <a href="#">password?</a></span> --}}
            {{-- </div> --}}
            <DIV class="sec-btn"><a href="{{ route('root') }}" class="btn btn-secondary">Already have an
                    account</a>
            </DIV>
        </form>
    </div>
@endsection
