<div class="modal fade" id="opArch" tabindex="-1" aria-labelledby="opArch" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="opArch">Update Archive</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="" action="{{ route('studentt.opArch') }}" method="POST" enctype="multipart/form-data">

                    @csrf


                    <div class="mb-3">
                        <label for="name" class="form-label">Group name</label>
                        <input type="text" class="form-control" placeholder="Name" name="GRP_NAME"
                            value="{{ old('PROG_NAME') }}" required>

                    </div>


                    <label for="Author" class="form-label">Available advisers (Select Only one)</label>

                    <select name="ADVSR_ID" id="countries" multiple>
                        @foreach ($adviser as $advc)
                        <option value="{{ $advc->EMP_ID }}">Adviser: <u>{{ $advc->NAME}}</u> </option>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new MultiSelectTag("countries");
        });
    </script>




</div>
