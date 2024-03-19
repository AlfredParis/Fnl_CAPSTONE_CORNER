<form action="{{ route('admin.update', ['S_ID' => $profile->EMP_ID]) }}" method="POST">
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
        <input class="form-control" type="password" name="PASSWORD" id="passwordA{{ $i }}" required>



    </div>


    <div class="form-group">
        <label for="archId">Archive ID</label>
        <input class="form-control" type="text" id="archId" name="ARCH_ID"
            value="{{ old('ARCH_ID', $profile->ARCH_ID) }} " required>
    </div>
    <div class="form-group">
        <label for="courseId">Course ID</label>
        <input class="form-control" type="text" id="courseId" name="C_ID" value="{{ old('C_ID', $profile->C_ID) }} "
            required>
    </div>
</form>