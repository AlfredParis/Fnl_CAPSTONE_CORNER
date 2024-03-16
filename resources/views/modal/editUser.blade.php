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
                        {{ ucfirst($Users->ACCTYPE) }} edit form for
                        @if ($Users->ACCTYPE== "student"){
                            {{$Users->S_ID}}
                        }
                        @else
                        {{ $Users->EMP_ID }}
                        @endif
                    @endif
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (!isset($Users))
                    @include('modal.togglePasswordEdit1')
                @else
                    @if ($Users->ACCTYPE == 'student')
                        @include('modal.togglePasswordEdit2')
                    @else
                        @include('modal.togglePasswordEdit3')
                    @endif
                @endif
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>


</div>
<script>
        document.addEventListener("DOMContentLoaded", function() {
                new MultiSelectTag("country");
            });
    function togglePasswordEdit1() {
        var x = document.querySelector("#passwordA{{ $id }}");
        console.log(x);
        if (x) {
            x.type = (x.type === "password") ? "text" : "password";
        }
    }

    function togglePasswordEdit2() {
        var x = document.querySelector("#passwordB{{ $id }}");
        console.log(x);
        if (x) {
            x.type = (x.type === "password") ? "text" : "password";
        }
    }

    function togglePasswordEdit3() {
        var x = document.querySelector("#passwordC{{ $id }}");
        console.log(x);
        if (x) {
            x.type = (x.type === "password") ? "text" : "password";
        }
    }
</script>
