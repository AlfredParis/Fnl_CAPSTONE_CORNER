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
<div class="modal fade" id="editUser_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    @php

        $isStudentAcc = \App\Models\student_acc::where('S_ID', $id)->first();
        $isStudent = \App\Models\STUDENT::where('S_ID', $id)->first();

        if (!isset($isStudentAcc) && isset($isStudent)) {
            $profile = $isStudent;
        } elseif (isset($isStudentAcc)) {
            $Users = $isStudentAcc;
            $profile = $isStudent;
        }
    @endphp
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    @if (isset($Users))
                        {{ ucfirst($Users->ACCTYPE) }} Edit Form
                    @else
                        Edit Form
                    @endif

                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

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
                        <input class="form-control" type="password" name="PASSWORD" id="passwordA{{ $i }}"
                            @if (!isset($Users)) required>




                    @else

                    value="{{ decrypt(old('PASSWORD', $Users->PASSWORD)) }}" required> @endif
                            </div>
                        <div class="showpass">
                            <input type="checkbox" onclick="togglePasswordEdit2()"> Show Password
                        </div>

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
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
