@extends('layout.homeLayout')

@section('title')
    Capstone Corner
@endsection

@section('topnav')
    <a href="{{ route('root') }}" class="active">login</a>
    <a href="{{ route('userCC.create') }}" class="inactive">regsiter</a>
@endsection

@section('main')
    <br>
    <div class="container">
        <form class="" action="{{ route('userCC.index') }}" method="get">
            @csrf

            <div class="form-group">
                <label for="userID">User ID</label>
                <input type="text" class="form-control" placeholder="Enter ID" name="userID" value="{{ old('userID') }}"
                    required>
            </div>
            @if (Session::get('messageid'))
                <span class="msgAlert">{{ Session::get('messageid') }}</span>
            @else
                <br>
            @endif



            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password"
                    value="{{ old('password') }}" id="myInput" required>
            </div>
            @if (Session::get('messagepass'))
                <span class="msgAlert">{{ Session::get('messagepass') }}</span>
            @else
                <br>
            @endif

            <div class="showpass">
                <input type="checkbox" onclick="myFunction()"> Show Password
            </div>
            {{-- <label class="form-check-label" for="remember">Remember me</label>  <input type="checkbox" class="form-check-input" checked="checked" name="remember"> --}}

            <div style="text-align: center">
                <button type="submit" class="btn btn-primary">Login</button>
                <br>
            </div>
            {{-- <div class="form-group" style="background-color:#f1f1f1"> --}}
            <div class="line">or</div>
            <br>
            {{-- <span class="psw">Forgot <a href="#">password?</a></span> --}}
            {{-- </div> --}}
            <DIV class="sec-btn"><a href="{{ route('userCC.create') }}" class="btn btn-secondary">Create an Account</a>
            </DIV>
        </form>
    </div>
@endsection
