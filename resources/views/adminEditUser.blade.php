@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    @if ($Users->acctype == 'student')
        <a href="{{ route('admin.student') }}" class="inactive">Return</a>
    @elseif ($Users->acctype == 'faculty')
        <a href="{{ route('admin.faculty') }}" class="inactive">Return</a>
    @elseif ($Users->acctype == 'admin')
        <a href="{{ route('admin.admin') }}" class="inactive">Return</a>
    @else
        <a href="{{ route('admin.archives') }}" class="inactive">Return</a>
    @endif
@endsection

@section('main')
    <p class="text-style">{{ $Users->acctype }} Edit Form</p>

    <br>
    <div class="container">
        <form action="{{ route('admin.update', ['id' => $Users->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="username">User name</label>
                <input class="form-control" type="text" id="username" name="userID"
                    value="{{ old('userID', $Users->userID) }} " required>
            </div>
            @error('')
                <span> {{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="fullname">Full name</label>
                <input class="form-control" type="text" name="fullname" value="{{ old('', $Users->fullname) }}"
                    id="fullname" required>
            </div>
            @error('')
                <span> {{ $message }}</span>
            @enderror

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="text" name="password" value="{{ decrypt(old('', $Users->password)) }}"
                    id="password" required>
            </div>
            @error('')
                <span> {{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="accountType">Account Type</label>
                <select class="form-control" name="acctype" value="{{ old('acctype', $Users->acctype) }}" id="accountType"
                    requiredw>


                    <option value="">select Account Type</option>

                    <option value="Users" {{ old('acctype', $Users->acctype) == 'user' ? 'selected' : '' }}>
                        user
                    </option>

                    <option value="faculty" {{ old('acctype', $Users->acctype) == 'faculty' ? 'selected' : '' }}>
                        faculty
                    </option>

                    <option value="admin" {{ old('acctype', $Users->acctype) == 'admin' ? 'selected' : '' }}>
                        admin
                    </option>

                </select>
            </div>
            @error('acctype')
                <span> {{ $message }}</span>
            @enderror

            <br><br><br>
            <div style="text-align: center">
                <input class="btn btn-primary" type="submit" name="submit" value="SAVE"><br>

        </form>
    </div>
    </div>
@endsection
