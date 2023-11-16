@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    @if (isset($Users))
        @if ($Users->ACCTYPE == 'student')
            <a href="{{ route('admin.student') }}" class="inactive">Return</a>
        @elseif ($Users->ACCTYPE == 'faculty')
            <a href="{{ route('admin.faculty') }}" class="inactive">Return</a>
        @elseif ($Users->ACCTYPE == 'admin')
            <a href="{{ route('admin.admin') }}" class="inactive">Return</a>
        @else
            <a href="{{ route('admin.archives') }}" class="inactive">Return</a>
        @endif
    @else
        <a href="{{ route('admin.student') }}" class="inactive">Return</a>
    @endif

@endsection

@section('main')
    <br><br><br> <br>
    @if (!isset($Users))
        <p class="text-style"> student edit form for {{ $profile->S_ID }}</p><br>
        <div class="container">

            <form action="{{ route('admin.update', ['S_ID' => $profile->S_ID]) }}" method="POST">
                @csrf
                @method('PUT')

                @error('')
                    <span> {{ $message }}</span>
                @enderror
                <div class="formGroup">
                    <label for="fullname">Full name</label>
                    <input class="formControl" type="text" name="NAME" value="{{ old('NAME', $profile->NAME) }}"
                        id="fullname" required>
                </div>
                @error('')
                    <span> {{ $message }}</span>
                @enderror

                <div class="formGroup">
                    <label for="PASSWORD">Password</label>
                    <input class="formControl" type="text" name="PASSWORD" value="" id="PASSWORD" required>
                </div>
                @error('')
                    <span> {{ $message }}</span>
                @enderror
                @error('ACCTYPE')
                    <span> {{ $message }}</span>
                @enderror
                <div class="formGroup">
                    <label for="archId">Archive ID</label>
                    <input class="formControl" type="text" id="archId" name="ARCH_ID"
                        value="{{ old('ARCH_ID', $profile->ARCH_ID) }} " required>
                </div>
                <div class="formGroup">
                    <label for="courseId">Course ID</label>
                    <input class="formControl" type="text" id="courseId" name="C_ID"
                        value="{{ old('C_ID', $profile->C_ID) }} " required>
                </div>

    @else
        @if ($Users->ACCTYPE == 'student')
            <p class="text-style">{{ $Users->ACCTYPE }} Edit Form for {{ $Users->S_ID }}</p>
            <div class="container">

                <form action="{{ route('admin.update', ['S_ID' => $Users->S_ID]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @error('')
                        <span> {{ $message }}</span>
                    @enderror
                    <div class="formGroup">
                        <label for="fullname">Full name</label>
                        <input class="formControl" type="text" name="NAME" value="{{ old('NAME', $profile->NAME) }}"
                            id="fullname" required>
                    </div>
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror

                    <div class="formGroup">
                        <label for="PASSWORD">Password</label>
                        <input class="formControl" type="text" name="PASSWORD"
                            value="{{ decrypt(old('PASSWORD', $Users->PASSWORD)) }}" id="PASSWORD" required>
                    </div>
                    <div class="showpass">
                                        <input type="checkbox" onclick="myFunction()"> Show Password
                                    </div>
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror

                    @error('ACCTYPE')
                        <span> {{ $message }}</span>
                    @enderror
                    <div class="formGroup">
                        <label for="archId">Archive ID</label>
                        <input class="formControl" type="text" id="archId" name="ARCH_ID"
                            value="{{ old('ARCH_ID', $profile->ARCH_ID) }} " required>
                    </div>
                    <div class="formGroup">
                        <label for="courseId">Course ID</label>
                        <input class="formControl" type="text" id="courseId" name="C_ID"
                            value="{{ old('C_ID', $profile->C_ID) }} " required>
                    </div>

        @else
            <p class="text-style">{{ $Users->ACCTYPE }} Edit Form for {{ $Users->EMP_ID }}</p>
            <div class="container">
                <form action="{{ route('admin.update', ['S_ID' => $Users->EMP_ID]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="formGroup">
                        <label for="fullname">{{ $Users->ACCTYPE }} name</label>
                        <input class="formControl" type="text" name="NAME" value="{{ old('NAME', $profile->NAME) }}"
                            id="fullname" required>
                    </div>
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror

                    <div class="formGroup">
                        <label for="password">Password</label>
                        <input class="formControl" type="text" name="PASSWORD"
                            value="{{ decrypt(old('PASSWORD', $Users->PASSWORD)) }}" id="password" required>
                    </div>
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror
                    <div class="formGroup">
                        <label for="accountType">Account Type</label>
                        <select class="formControl" name="ACCTYPE" value="{{ old('ACCTYPE', $Users->ACCTYPE) }}"
                            id="accountType" requiredw>



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



            </div>
            <br><br><br>
            <div style="text-align: center">
                <input class="btn btn-primary" type="submit" name="submit" value="SAVE"><br>

        </form>
    </div>
    </div>
            </div>
        @endif
    @endif
@endsection
