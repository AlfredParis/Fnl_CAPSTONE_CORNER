@extends('layout.homeLayout')

@section('title')
Regsiter
@endsection

@section('topnav')
<a href="{{ route('root') }}" class="inactive">login</a>
<a href="{{ route('userCC.create') }}" class="active">regsiter</a>
@endsection

@section('main')

<div class="container">



    <form action="{{ route('userCC.store') }}" method="POST">
        @csrf


        <div class="form-group">
            <label for="S_ID">Student ID</label>
            <input type="text" class="form-control" placeholder="Student ID" name="S_ID" value="{{ old('S_ID') }}"
                required>
        </div>
        <div class="form-group">
            <label for="NAME">Student Name</label>
            <input type="text" class="form-control" placeholder="Name" name="NAME" value="{{ old('NAME') }}" required>
        </div>
        <div class="form-group">
            <label for="DEPT_ID">Course</label>

            @php
            $CHMBAC=App\Models\department::where('PROG_ID', 2)->get();
            $CTE=App\Models\department::where('PROG_ID', 1)->get();
            $AGRI=App\Models\department::where('PROG_ID', 3)->get();
            @endphp

            <select class="custom-select" name="DEPT_ID" id="DEPT_ID">
                <option value="">select your course</option>
                @foreach ($CHMBAC as $item)
                <option value="{{$item->id}}">{{$item->DEPT_NAME}}</option>
                @endforeach
                @foreach ($CTE as $item)
                <option value="{{$item->id}}">{{$item->DEPT_NAME}}</option>
                @endforeach
                @foreach ($AGRI as $item)
                <option value="{{$item->id}}">{{$item->DEPT_NAME}}</option>
                @endforeach
            </select>


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

        <div style="text-align: center">
            <button type="submit" class="btn btn-primary">Register</button>
            <br>
        </div>

        <div class="line">or</div>
        <br>

        <DIV class="sec-btn"><a href="{{ route('root') }}" class="btn btn-secondary">Already have an
                account</a>
        </DIV>
    </form>
</div>
@endsection