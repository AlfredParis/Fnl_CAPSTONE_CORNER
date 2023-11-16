<div class="modal fade" id="viewUser_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        {{ ucfirst($Users->ACCTYPE) }} View
                    @else
                        View
                    @endif

                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                @if (!isset($Users))

                <div class="form-group">
                    <label for="fullname">ID</label>
                    <p class="form-control"> {{ $profile->S_ID }}</p>
                </div>

                    <div class="form-group">
                        <label for="fullname">Full name</label>
                        <p class="form-control"> {{ $profile->NAME }}</p>
                    </div>

                    <div class="form-group">
                        <label for="archId">Archive ID</label>

                        <p class="form-control">{{ $profile->ARCH_ID }}</p>
                    </div>
                    <div class="form-group">
                        <label for="courseId">Course</label>

                        <p class="form-control">{{ $student->C_DESC }}</p>
                    </div>
                @else
                    @if ($Users->ACCTYPE == 'student')


                    <div class="form-group">
                        <label for="fullname">ID</label>
                        <p class="form-control"> {{ $profile->S_ID }}</p>
                    </div>
                        <div class="form-group">
                            <label for="fullname">Full name</label>

                            <p class="form-control"> {{ $profile->NAME }}</p>
                        </div>




                        <div class="form-group">
                            <label for="archId">Archive ID</label>
                            <p class="form-control">{{ $profile->ARCH_ID }}</p>
                        </div>
                        <div class="form-group">
                            <label for="courseId">Course</label>

                            <p class="form-control">{{ $student->C_DESC }}</p>
                        </div>
                    @else
                    <div class="form-group">
                        <label for="fullname">ID</label>
                        <p class="form-control"> {{ $Users->EMP_ID }}</p>
                    </div>
                        <div class="form-group">
                            <label for="fullname">{{ ucfirst($Users->ACCTYPE) }} name</label>
                          <p class="form-control">{{$profile->NAME}}</p>
                        </div>



                        <div class="form-group">
                            <label for="fullname">Account type</label>
                            <p class="form-control">{{ $Users->ACCTYPE }}</p>


                        </div>
                    @endif
                @endif

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>

        </div>
    </div>


</div>
