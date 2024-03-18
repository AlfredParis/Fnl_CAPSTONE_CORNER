<div class="modal fade" id="turnOver_{{  $archive->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Turn Over Form
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('turnOver',['grp_id' =>  $archive->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="archId">Title</label>
                        <input class="form-control" type="text" id="archId" name="TITLE" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="ABS">Abstract</label>
                        <textarea name="ABS" id="" cols="60" rows="5"></textarea>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">SAVE</button>
            </div>
            </form>

        </div>
    </div>

</div>