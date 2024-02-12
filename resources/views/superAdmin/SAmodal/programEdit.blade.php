<div class="modal fade" id="progEdit{{ $pro->id }}" tabindex="-1" aria-labelledby="progEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="progEdit">Edit {{$pro->PROG_ABBR}} Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="" action=" {{ route('superAdmin.updateProg', ['id' =>  $pro->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Program name</label>
                        <input type="text" class="form-control" placeholder="Name" name="PROG_NAME"
                            value="{{ old('PROG_ABBR', $pro->PROG_NAME) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Program abbreviation</label>
                        <input type="text" class="form-control" placeholder="Ex. BSIT" name="PROG_ABBR"
                            value="{{ old('PROG_ABBR', $pro->PROG_ABBR) }}" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">SAVE</button>
            </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new MultiSelectTag("countries");
        });
    </script>




</div>