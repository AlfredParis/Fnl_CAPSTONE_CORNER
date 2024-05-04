<div class="modal fade" id="panAdd{{$GRP_det->id}}" tabindex="-1" aria-labelledby="panAdd{{$GRP_det->id}}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="memAdd">Add Panel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @php
                $id = Session::get('course');

                // $grpid= \App\Models\STUDENT::where('GROUP_ID', $GRP_det->id)->Get();
                $nonPanel= \App\Models\panelModel::where('GRP_ID', $GRP_det->id)->get();

                $panelS= \App\Models\EMPLOYEE::whereNotIn('id',$nonPanel)->Get();
                @endphp
                <form class="" action="{{ route('faculty.updateMember',['advisory' => $GRP_det->id]) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf


                    <label for="Author" class="form-label">Choose Members</label>

                    <select name="pan[]" id="pan" multiple>
                        @foreach ($panelS as $panel)
                        <option value="{{ $panel->id }}"><u>{{ $panel->NAME}}</u> </option>
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
