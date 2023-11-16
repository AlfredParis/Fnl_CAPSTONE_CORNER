<div class="modal fade" id="editUser_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    @php

        $isAdmin = \App\Models\USER_ACC_EMP::where('EMP_ID', $id)->first();
        $isStudentAcc = \App\Models\student_acc::where('S_ID', $id)->first();
        $isStudent = \App\Models\STUDENT::where('S_ID', $id)->first();

        if (!isset($isStudentAcc) && isset($isStudent)) {
            $profile = $isStudent;
        } elseif (isset($isStudentAcc)) {
            $Users = $isStudentAcc;
            $profile = $isStudent;
        } elseif (isset($isAdmin)) {
            $Users = $isAdmin;
            $profile = \App\Models\EMPLOYEE::where('EMP_ID', $id)->first();
        }
    @endphp
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    @if (isset($Users))
                        {{ $Users->ACCTYPE }} Edit Form
                    @else
                       Edit Form
                    @endif

                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                @if (!isset($Users))


                    <form action="{{ route('admin.update', ['S_ID' => $profile->S_ID]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @error('')
                            <span> {{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label for="fullname">Full name</label>
                            <input class="form-control" type="text" name="NAME"
                                value="{{ old('NAME', $profile->NAME) }}" id="fullname" required>
                        </div>

                        @error('')
                            <span> {{ $message }}</span>
                        @enderror

                        <div class="form-group">
                            <label for="PASSWORD">Password</label>
                            <input class="form-control" type="password" name="PASSWORD" value="" id="myInput"
                                required>


                        </div>
                        <div class="showpass">
                            <input type="checkbox" onclick="pass()"> Show Password
                        </div>
                        @error('')
                            <span> {{ $message }}</span>
                        @enderror
                        @error('ACCTYPE')
                            <span> {{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label for="archId">Archive ID</label>
                            <input class="form-control" type="text" id="archId" name="ARCH_ID"
                                value="{{ old('ARCH_ID', $profile->ARCH_ID) }} " required>
                        </div>
                        <div class="form-group">
                            <label for="courseId">Course ID</label>
                            <input class="form-control" type="text" id="courseId" name="C_ID"
                                value="{{ old('C_ID', $profile->C_ID) }} " required>
                        </div>
                    @else
                        @if ($Users->ACCTYPE == 'student')
                            <p class="text-style"></p>
                            <div class="container">

                                <form action="{{ route('admin.update', ['S_ID' => $Users->S_ID]) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    @error('')
                                        <span> {{ $message }}</span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="fullname">Full name</label>
                                        <input class="form-control" type="text" name="NAME"
                                            value="{{ old('NAME', $profile->NAME) }}" id="fullname" required>
                                    </div>
                                    @error('')
                                        <span> {{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="PASSWORD">Password</label>
                                        <input class="form-control" type="password" name="PASSWORD"
                                            value="{{ decrypt(old('PASSWORD', $Users->PASSWORD)) }}" id="myInput"
                                            required>
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
                                    <div class="form-group">
                                        <label for="archId">Archive ID</label>
                                        <input class="form-control" type="text" id="archId" name="ARCH_ID"
                                            value="{{ old('ARCH_ID', $profile->ARCH_ID) }} " required>
                                    </div>
                                    <div class="form-group">
                                        <label for="courseId">Course ID</label>
                                        <input class="form-control" type="text" id="courseId" name="C_ID"
                                            value="{{ old('C_ID', $profile->C_ID) }} " required>
                                    </div>
                                @else
                                    <form action="{{ route('admin.update', ['S_ID' => $Users->EMP_ID]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="fullname">{{ $Users->ACCTYPE }} name</label>
                                            <input class="form-control" type="text" name="NAME"
                                                value="{{ old('NAME', $profile->NAME) }}" id="fullname" required>
                                        </div>
                                        @error('')
                                            <span> {{ $message }}</span>
                                        @enderror

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" name="PASSWORD"
                                                value="{{ decrypt(old('PASSWORD', $Users->PASSWORD)) }}" id="myInput"
                                                required>
                                        </div>
                                        <div class="showpass">
                                            <input type="checkbox" onclick="myFunction()"> Show Password
                                        </div>
                                        @error('')
                                            <span> {{ $message }}</span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="accountType">Account Type</label>
                                            <select class="form-control" name="ACCTYPE"
                                                value="{{ old('ACCTYPE', $Users->ACCTYPE) }}" id="accountType"
                                                requiredw>



                                                <option value="faculty"
                                                    {{ old('ACCTYPE', $Users->ACCTYPE) == 'faculty' ? 'selected' : '' }}>
                                                    faculty
                                                </option>

                                                <option value="admin"
                                                    {{ old('ACCTYPE', $Users->ACCTYPE) == 'admin' ? 'selected' : '' }}>
                                                    admin
                                                </option>

                                            </select>
                                        </div>
                                        @error('ACCTYPE')
                                            <span> {{ $message }}</span>
                                        @enderror
                        @endif
                @endif

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>


</div>
