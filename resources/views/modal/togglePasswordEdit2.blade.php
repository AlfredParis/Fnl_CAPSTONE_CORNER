@php
     $course= \App\Models\department::Get();

@endphp

<form action="{{ route('userUpdate', ['S_ID' => $Users->S_ID]) }}" method="POST">
    @csrf
    @method('PUT')


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
            value="" placeholder="Enter your old password" required>
    </div>
    <div class="form-group">
        <label for="PASSWORD">Password</label>
        <input id="passwordB{{ $i }}" class="form-control" type="password" name="NewPASSWORD"
            value="" placeholder="Enter new password">
    </div>
    <div class="form-group">
        <label for="PASSWORD">Course (choose only 1)</label>
            <select name="C_ID[]" id="country" multiple>
                @foreach ($course as $mmbr)
                <option value="{{ $mmbr->S_ID }}"><u>{{ $mmbr->DEPT_NAME}}</u> </option>
                @endforeach
            </select>
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
