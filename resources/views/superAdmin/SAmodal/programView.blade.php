<div class="modal fade" id="progView{{ $pro->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    @php

    // $isStudentAcc = \App\Models\student_acc::where('S_ID', $id)->first();

    $isStudent = \App\Models\department::where('PROG_ID', $pro->id)->get();

    // if (!isset($isStudentAcc) && isset($isStudent)) {
    // $profile = $isStudent;
    // } elseif (isset($isStudentAcc)) {
    // $Users = $isStudentAcc;
    // $profile = $isStudent;
    // }

    @endphp
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">

                    {{ $pro->PROG_NAME }} Department


                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form action="{{ route('superAdmin.updatePosition', ['S_ID' => $pro->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @foreach ($isStudent as $item)
                    <div class="form-group" style="padding-bottom: 10px;">

                        <input class="form-control" type="text" name="NAME" value="{{ old('NAME', $item->DEPT_NAME) }}"
                            id="fullname" required>
                    </div>
                    @endforeach


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>


    </div>
</div>