<div class="modal fade" id="progView{{ $pro->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    @php

    $isStudent = \App\Models\department::where('PROG_ID', $pro->id)->get();

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


                <form action="{{ route('superAdmin.updateCourse', ['S_ID' => $pro->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @foreach ($isStudent as $item)
                    <div class="form-group" style="padding-bottom: 10px;">
                        <input type="text" name="id" value="{{ old('NAME', $item->id) }}">
                        <input class="form-control" type="text" name="NAME" value="{{ old('NAME', $item->DEPT_NAME) }}"
                            id="fullname" required>
                    </div>
                    @endforeach


                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>


    </div>
</div>
<div class="modal fade" id="addCourse{{ $pro->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    @php

    $isStudent = \App\Models\department::where('PROG_ID', $pro->id)->get();

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


                <form action="{{ route('superAdmin.addCourse', ['id' => $pro->id]) }}" method="POST">
                    @csrf
                    @method('POST')


                    <div class="mb-3">
                        <label for="name" class="form-label">Course Name</label>
                        <input type="text" class="form-control" placeholder="Enter course name" name="DEPT_NAME"
                            required>
                    </div>

                    <div class="modal-footer">

                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                <a href=""></a>
            </div>
        </div>


    </div>
</div>
