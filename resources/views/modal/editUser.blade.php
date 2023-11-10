<div class="modal fade" id="editUser_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Archive update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @php

                    $isAdmin = \App\Models\USER_ACC_EMP::where('EMP_ID', $id)->first();
                    $isStudent = \App\Models\student_acc::where('S_ID', $id)->first();
                    $isDontAcc = \App\Models\STUDENT::where('S_ID', $id)->first();

                    if (!isset($isStudent) && isset($isDontAcc)) {
                        $profile = STUDENT::where('S_ID', $id)->first();

                        return view('adminEditUser', compact('profile'));
                    } elseif (isset($isStudent)) {
                        $Users = $isStudent;
                        $profile = STUDENT::where('S_ID', $id)->first();

                        return view('adminEditUser', compact('Users', 'profile'));
                    } elseif (isset($isAdmin)) {
                        $Users = $isAdmin;
                        $profile = EMPLOYEE::where('EMP_ID', $id)->first();
                        return view('adminEditUser', compact('Users', 'profile'));
                    }
                @endphp
                @if (!isset($isStudent) && isset($isDontAcc))
                    <p class="text-style"> student edit form for {{ $profile->S_ID }}</p><br>

                    <form action="{{ route('admin.update', ['S_ID' => $student->S_ID]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @error('')
                            <span> {{ $message }}</span>
                        @enderror
                        <div class="formGroup">
                            <label for="fullname">Full name</label>
                            <input class="formControl" type="text" name="NAME"
                                value="{{ old('NAME', $profile->NAME) }}" id="fullname" required>
                        </div>
                        @error('')
                            <span> {{ $message }}</span>
                        @enderror

                        <div class="formGroup">
                            <label for="PASSWORD">Password</label>
                            <input class="formControl" type="text" name="PASSWORD" value="" id="PASSWORD"
                                required>
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
                        <br><br><br>
                        <div style="text-align: center">
                            <input class="btn btn-primary" type="submit" name="submit" value="SAVE"><br>

                    </form>
                @else
                    @if (isset($isStudent))
                        <p class="text-style">{{ $isStudent->ACCTYPE }} Edit Form for {{ $isStudent->S_ID }}</p>

                        <form action="{{ route('admin.update', ['S_ID' => $isStudent->S_ID]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            @error('')
                                <span> {{ $message }}</span>
                            @enderror
                            <div class="formGroup">
                                <label for="fullname">Full name</label>
                                <input class="formControl" type="text" name="NAME"
                                    value="{{ old('NAME', $isDontAcc->NAME) }}" id="fullname" required>
                            </div>
                            @error('')
                                <span> {{ $message }}</span>
                            @enderror

                            <div class="formGroup">
                                <label for="PASSWORD">Password</label>
                                <input class="formControl" type="text" name="PASSWORD"
                                    value="{{ decrypt(old('PASSWORD', $isDontAcc->PASSWORD)) }}" id="PASSWORD"
                                    required>
                            </div>
                            @error('')
                                <span> {{ $message }}</span>
                            @enderror
                            @if (!isset($isStudent))
                                <p class="text-style"> student edit form for {{ $isDontAcc->S_ID }}</p><br>
                                <div class="container">

                                    <form action="{{ route('admin.update', ['S_ID' => $isDontAcc->S_ID]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        @error('')
                                            <span> {{ $message }}</span>
                                        @enderror
                                        <div class="formGroup">
                                            <label for="fullname">Full name</label>
                                            <input class="formControl" type="text" name="NAME"
                                                value="{{ old('NAME', $isDontAcc->NAME) }}" id="fullname" required>
                                        </div>
                                        @error('')
                                            <span> {{ $message }}</span>
                                        @enderror

                                        <div class="formGroup">
                                            <label for="PASSWORD">Password</label>
                                            <input class="formControl" type="text" name="PASSWORD" value=""
                                                id="PASSWORD" required>
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
                                        <br><br><br>
                                        <div style="text-align: center">
                                            <input class="btn btn-primary" type="submit" name="submit"
                                                value="SAVE"><br>

                                    </form>
                                @else
                                    @if ($isStudent->ACCTYPE == 'student')
                                        <p class="text-style">{{ $isStudent->ACCTYPE }} Edit Form for
                                            {{ $isStudent->S_ID }}
                                        </p>

                                        <form action="{{ route('admin.update', ['S_ID' => $isStudent->S_ID]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')

                                            @error('')
                                                <span> {{ $message }}</span>
                                            @enderror
                                            <div class="formGroup">
                                                <label for="fullname">Full name</label>
                                                <input class="formControl" type="text" name="NAME"
                                                    value="{{ old('NAME', $profile->NAME) }}" id="fullname"
                                                    required>
                                            </div>
                                            @error('')
                                                <span> {{ $message }}</span>
                                            @enderror

                                            <div class="formGroup">
                                                <label for="PASSWORD">Password</label>
                                                <input class="formControl" type="text" name="PASSWORD"
                                                    value="{{ decrypt(old('PASSWORD', $isStudent->PASSWORD)) }}"
                                                    id="PASSWORD" required>
                                            </div>
                                            @error('')
                                                <span> {{ $message }}</span>
                                            @enderror

                                            @error('ACCTYPE')
                                                <span> {{ $message }}</span>
                                            @enderror
                                            <div class="formGroup">
                                                <label for="archId">Archive ID</label>
                                                <input class="formControl" type="text" id="archId"
                                                    name="ARCH_ID" value="{{ old('ARCH_ID', $profile->ARCH_ID) }} "
                                                    required>
                                            </div>
                                            <div class="formGroup">
                                                <label for="courseId">Course ID</label>
                                                <input class="formControl" type="text" id="courseId"
                                                    name="C_ID" value="{{ old('C_ID', $profile->C_ID) }} "
                                                    required>
                                            </div>
                                            <br><br><br>
                                            <div style="text-align: center">
                                                <input class="btn btn-primary" type="submit" name="submit"
                                                    value="SAVE"><br>

                                        </form>
                                    @else
                                        <p class="text-style">{{ $isStudent->ACCTYPE }} Edit Form for
                                            {{ $isStudent->EMP_ID }}</p>

                                        <form action="{{ route('admin.update', ['S_ID' => $isStudent->EMP_ID]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="formGroup">
                                                <label for="fullname">{{ $isStudent->ACCTYPE }} name</label>
                                                <input class="formControl" type="text" name="NAME"
                                                    value="{{ old('NAME', $profile->NAME) }}" id="fullname"
                                                    required>
                                            </div>
                                            @error('')
                                                <span> {{ $message }}</span>
                                            @enderror

                                            <div class="formGroup">
                                                <label for="password">Password</label>
                                                <input class="formControl" type="text" name="PASSWORD"
                                                    value="{{ decrypt(old('PASSWORD', $isStudent->PASSWORD)) }}"
                                                    id="password" required>
                                            </div>
                                            @error('')
                                                <span> {{ $message }}</span>
                                            @enderror
                                            <div class="formGroup">
                                                <label for="accountType">Account Type</label>
                                                <select class="formControl" name="ACCTYPE"
                                                    value="{{ old('ACCTYPE', $isStudent->ACCTYPE) }}"
                                                    id="accountType" requiredw>



                                                    <option value="faculty"
                                                        {{ old('ACCTYPE', $isStudent->ACCTYPE) == 'faculty' ? 'selected' : '' }}>
                                                        faculty
                                                    </option>

                                                    <option value="admin"
                                                        {{ old('ACCTYPE', $isStudent->ACCTYPE) == 'admin' ? 'selected' : '' }}>
                                                        admin
                                                    </option>

                                                </select>
                                            </div>
                                            @error('ACCTYPE')
                                                <span> {{ $message }}</span>
                                            @enderror

                                            <br><br><br>
                                            <div style="text-align: center">
                                                <input class="btn btn-primary" type="submit" name="submit"
                                                    value="SAVE"><br>

                                        </form>
                                    @endif
                            @endif
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
                            <br><br><br>
                            <div style="text-align: center">
                                <input class="btn btn-primary" type="submit" name="submit" value="SAVE"><br>

                        </form>
            </div>
        @else
            <p class="text-style">{{ $isStudent->ACCTYPE }} Edit Form for {{ $isStudent->EMP_ID }}</p>
            <div class="container">
                <form action="{{ route('admin.update', ['S_ID' => $isStudent->EMP_ID]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- <div class="formGroup">
                    <label for="username">User name</label>
                    <input class="formControl" type="text" id="username" name="userID"
                        value="{{ old('userID', $isStudent->userID) }} " required>
                </div>
                @error('')
                    <span> {{ $message }}</span>
                @enderror --}}
                    <div class="formGroup">
                        <label for="fullname">{{ $isStudent->ACCTYPE }} name</label>
                        <input class="formControl" type="text" name="NAME"
                            value="{{ old('NAME', $profile->NAME) }}" id="fullname" required>
                    </div>
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror

                    <div class="formGroup">
                        <label for="password">Password</label>
                        <input class="formControl" type="text" name="PASSWORD"
                            value="{{ decrypt(old('PASSWORD', $isStudent->PASSWORD)) }}" id="password" required>
                    </div>
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror
                    <div class="formGroup">
                        <label for="accountType">Account Type</label>
                        <select class="formControl" name="ACCTYPE" value="{{ old('ACCTYPE', $isStudent->ACCTYPE) }}"
                            id="accountType" requiredw>



                            <option value="faculty"
                                {{ old('ACCTYPE', $isStudent->ACCTYPE) == 'faculty' ? 'selected' : '' }}>
                                faculty
                            </option>

                            <option value="admin"
                                {{ old('ACCTYPE', $isStudent->ACCTYPE) == 'admin' ? 'selected' : '' }}>
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

            @endif
            @endif

        </div>
    </div>
</div>


</div>
