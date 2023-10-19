@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    @if ($Users->ACCTYPE == 'student')
        <a href="{{ route('admin.student') }}" class="inactive">Return</a>
    @elseif ($Users->ACCTYPE == 'faculty')
        <a href="{{ route('admin.faculty') }}" class="inactive">Return</a>
    @elseif ($Users->ACCTYPE == 'admin')
        <a href="{{ route('admin.admin') }}" class="inactive">Return</a>
    @else
        <a href="{{ route('admin.archives') }}" class="inactive">Return</a>
    @endif
@endsection

@section('main')
    <p class="text-style">{{ $Users->ACCTYPE }} Edit Form for {{ $Users->S_ID }}</p>

    <br>
    @if ($Users->ACCTYPE == 'student')
        <div class="container">
            <form action="{{ route('admin.update', ['id' => $Users->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="username">Student name</label>
                    <input class="form-control" type="text" id="username" name="userID"
                        value="{{ old('userID', $Users->userID) }} " required>
                </div>
                @error('')
                    <span> {{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="fullname">Full name</label>
                    <input class="form-control" type="text" name="fullname" value="{{ old('', $profile->NAME) }}"
                        id="fullname" required>
                </div>
                @error('')
                    <span> {{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="text" name="password"
                        value="{{ decrypt(old('', $Users->PASSWORD)) }}" id="password" required>
                </div>
                @error('')
                    <span> {{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="accountType">Account Type</label>
                    <select class="form-control" name="ACCTYPE" value="{{ old('ACCTYPE', $profile->ARCH_ID) }}"
                        id="accountType" requiredw>


                        <option value="">select Account Type</option>

                        <option value="student" {{ old('ACCTYPE', $Users->ACCTYPE) == 'student' ? 'selected' : '' }}>
                            student
                        </option>

                        <option value="faculty" {{ old('ACCTYPE', $Users->ACCTYPE) == 'faculty' ? 'selected' : '' }}>
                            faculty
                        </option>

                        <option value="admin" {{ old('ACCTYPE', $Users->ACCTYPE) == 'admin' ? 'selected' : '' }}>
                            admin
                        </option>

                    </select>
                </div>
                @error('ACCTYPE')
                    <span> {{ $message }}</span>
                @enderror

                <br><br><br>
                <div style="text-align: center">
                    <input class="btn btn-primary" type="submit" name="submit" value="SAVE"><br>

            </form>
        </div>
        </div>
    @else
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
                    <input class="form-control" type="text" name="password"
                        value="{{ decrypt(old('', $Users->PASSWORD)) }}" id="password" required>
                </div>
                @error('')
                    <span> {{ $message }}</span>
                @enderror
                <div class="form-group">
                    <label for="accountType">Account Type</label>
                    <select class="form-control" name="ACCTYPE" value="{{ old('ACCTYPE', $Users->ACCTYPE) }}"
                        id="accountType" requiredw>


                        <option value="">select Account Type</option>

                        <option value="student" {{ old('ACCTYPE', $Users->ACCTYPE) == 'student' ? 'selected' : '' }}>
                            student
                        </option>

                        <option value="faculty" {{ old('ACCTYPE', $Users->ACCTYPE) == 'faculty' ? 'selected' : '' }}>
                            faculty
                        </option>

                        <option value="admin" {{ old('ACCTYPE', $Users->ACCTYPE) == 'admin' ? 'selected' : '' }}>
                            admin
                        </option>

                    </select>
                </div>
                @error('ACCTYPE')
                    <span> {{ $message }}</span>
                @enderror

                <br><br><br>
                <div style="text-align: center">
                    <input class="btn btn-primary" type="submit" name="submit" value="SAVE"><br>

            </form>
        </div>
        </div>
    @endif
@endsection
