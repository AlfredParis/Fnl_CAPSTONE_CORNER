<form action="{{ route('admin.update', ['S_ID' => $Users->S_ID]) }}" method="POST">
    @csrf
    @method('PUT')

    @error('')
        <span> {{ $message }}</span>
    @enderror
    <div class="form-group">
        <label for="fullname">Full name</label>
        <input class="form-control" type="text" name="NAME" value="{{ old('NAME', $profile->NAME) }}" id="fullname"
            required>
    </div>
    @error('')
        <span> {{ $message }}</span>
    @enderror

    <div class="form-group">
        <label for="PASSWORD">Password</label>
        <input id="passwordB{{ $i }}" class="form-control" type="password" name="PASSWORD"
            value="{{ decrypt(old('PASSWORD', $Users->PASSWORD)) }}" required>

    </div>
    {{-- <div class="showpass">
        <input type="checkbox" onclick="togglePasswordEdit2()"> Show Password
    </div> --}}

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
    <script>
        function togglePasswordEdit2() {

            var x = document.getElementById("passwordB{{ $i }}");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
