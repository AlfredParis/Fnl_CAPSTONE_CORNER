<div class="modal fade" id="progAdd" tabindex="-1" aria-labelledby="progAdd" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="progAdd">Add Program Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="" action="{{ route('superAdmin.storeArch') }}" method="POST" enctype="multipart/form-data">

                    @csrf


                    <div class="mb-3">
                        <label for="name" class="form-label">Program name</label>
                        <input type="text" class="form-control" placeholder="Name" name="PROG_NAME"
                            value="{{ old('PROG_NAME') }}" required>

                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Program abbreviation</label>
                        <input type="text" class="form-control" placeholder="Ex. BSIT" name="PROG_ABBR"
                            value="{{ old('PROG_ABBR') }}" required>

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