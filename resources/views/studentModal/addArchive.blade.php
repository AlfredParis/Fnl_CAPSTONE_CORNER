<div class="modal fade" id="addArchive" tabindex="-1" aria-labelledby="addArchive" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addArchive">Archive add</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="" action="{{ route('studentt.storeArch') }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf


                    <div class="mb-3">
                        <label for="name" class="form-label">Archive Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="name"
                            value="{{ old('name') }}" required>

                    </div>



                    <div class="mb-3">


                        <label for="pdf_file" class="form-label">Documentation</label>
                        <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf"
                            value="{{ old('pdf_file') }}" id="pdf" class="form-control">

                    </div>

                    <div class="mb-3">
                        <label for="pubYear" class="form-label">Approved Year</label>
                        <input type="text" class="form-control" placeholder="Ex: JUNE 2023" name="pubYear"
                            value="{{ old('pubYear') }}" required>

                    </div>

                    <div class="mb-3">
                        <label for="gh" class="form-label">GitHub Repository</label>
                        <input type="text" class="form-control" placeholder="Enter Link" name="gh" id="gh"
                            value="{{ old('gh') }}">

                    </div>

                    <div class="dropdown">
                        <label for="Status" class="form-label">Status:</label>
                        <select id="stat" name="stat" class="form-select" aria-label="Default select example">
                            <option value="approved">approved</option>
                            <option value="not approved">not approved</option>

                        </select>


                        <br>
                    </div>
                    <div class="form-floating">

                        <textarea class="form-control" placeholder="Leave a abstract here" name="abs"
                            id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Abstract</label>
                    </div>




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Archive</button>
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
