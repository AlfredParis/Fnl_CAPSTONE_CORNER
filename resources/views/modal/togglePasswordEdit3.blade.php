<form action="{{ route('admin.update', ['S_ID' => $Users->EMP_ID]) }}" method="POST">
    @csrf
    @method('PUT')
    @php
        // return dd($id);
    @endphp
    <div class="form-group">
        <label for="fullname">ID</label>
        <p class="form-control"> {{ $Users->EMP_ID }}</p>
    </div>
    <div class="form-group">
        <label for="fullname">{{ $Users->ACCTYPE }} name</label>
        <input class="form-control" type="text" name="NAME" value="{{ old('NAME', $profile->NAME) }}" id="fullname"
            required>
    </div>
    @error('')
        <span> {{ $message }}</span>
    @enderror

    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="PASSWORD"
            value="{{ decrypt(old('PASSWORD', $Users->PASSWORD)) }}" id="" required>

    </div>
    {{-- <div class="showpass">
        <input type="checkbox" onclick="togglePasswordEdit3()"> Show Password
    </div> --}}
    @error('')
        <span> {{ $message }}</span>
    @enderror

    <div class="form-group">
        <label for="accountType">Account Type</label>
        <select class="form-control" name="ACCTYPE" value="{{ old('ACCTYPE', $Users->ACCTYPE) }}" id="accountType"
            requiredw>



            <option value="faculty" {{ old('ACCTYPE', $Users->ACCTYPE) == 'faculty' ? 'selected' : '' }}>
                faculty
            </option>

            <option value="admin" {{ old('ACCTYPE', $Users->ACCTYPE) == 'admin' ? 'selected' : '' }}>
                admin
            </option>
            <option value="subAdmin" {{ old('ACCTYPE', $Users->ACCTYPE) == 'subAdmin' ? 'selected' : '' }}>
                subAdmin
            </option>

            <option value="superAdmin" {{ old('ACCTYPE', $Users->ACCTYPE) == 'superAdmin' ? 'selected' : '' }}>
                superAdmin
            </option>

        </select>
    </div>
    <script>
        function togglePasswordEdit3() {

            var x = document.getElementById("");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
