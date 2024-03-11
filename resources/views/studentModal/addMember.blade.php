<div class="modal fade" id="memAdd" tabindex="-1" aria-labelledby="memAdd" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="memAdd">Add Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
@php
 $id = Session::get('course');

 $mmdrCourse= \App\Models\STUDENT::where('GROUP_ID', $GRP_det->id)->Get();
 $addmmbr=  \App\Models\STUDENT::where('GROUP_ID','N/A')->Get();
@endphp
                <form class="" action="{{ route('studentt.updateMember') }}" method="POST" enctype="multipart/form-data">

                    @csrf


                    <label for="Author" class="form-label">Choose Members</label>

                    <select name="S_ID[]" id="countries" multiple>
                        @foreach ($addmmbr as $mmbr)
                        <option value="{{ $mmbr->S_ID }}"><u>{{ $mmbr->NAME}}</u> </option>
                        @endforeach
                    </select>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">SAVE</button>
            </div>
            </form>
        </div>
    </div>




</div>
