<div class="modal fade" id="addArch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Archive add</h1>
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
                        <label for="abs" class="form-label">Enter a your abstract:</label>
                        <textarea class="form-control" type="text" name="abs" id="abs"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pdf">Documentation</label>
                        <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf"
                            value="{{ old('pdf_file') }}" id="pdf" class="form-control">

                    </div>
                    <div class="mb-3" class="form-label">
                        <label for="gh">GitHub Repository</label>
                        <input type="text" class="form-control" placeholder="Enter Link" name="gh"
                            id="gh" value="{{ old('gh') }}">

                    </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Archive</button>
            </div>
            </form>
        </div>
    </div>
