<div class="modal fade" id="archView{{ $archive->ARCH_ID }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Archive update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @php
                    $auth = App\Models\STUDENT::where('ARCH_ID', $archive->ARCH_ID)->get();
                @endphp

                <div class="mb-3">
                    <label for="archID" class="form-label">Archive ID</label>
                    <input type="text" class="form-control" placeholder="Enter Archive ID" id="archID"
                        name="ARCH_ID" value="{{ old('ARCH_ID', $archive->ARCH_ID) }}" required>

                </div>

                <div class="mb-3">

                    <label for="name" class="form-label">Archive name</label>
                    <input class="form-control" type="text" name="ARCH_NAME"
                        value="{{ old('ARCH_NAME', $archive->ARCH_NAME) }}" id="name" required>


                </div>


                <div class="mb-3">



                </div>


                <div class="mb-3">
                    <label for="gh" class="form-label">GitHub Repository</label>
                    <p class="form-control">{{ $archive->GITHUB_LINK }}</p>

                </div>
                <div class="mb-3">

                    <p>{{ old('PDF_FILE') }}</p>
                    <label for="pdf_file" class="form-label">Documentation</label>


                    <a class="form-control" href="#"
                        onclick="openPDF('{{ asset('storage/pdfs/' . $archive->PDF_FILE) }}');">{{ $archive->PDF_FILE }}</a>


                </div>
                <div class="mb-3">
                    <label for="Status" class="form-label">Status:</label>
                    {{ $archive->ABSTRACT }}

                </div>
                <div class="mb-3">
                    <label for="form-label">Abstract</label>
                    <textarea class="form-control" read-only=true>{{ $archive->ABSTRACT }}</textarea>

                </div>
                <div class="mb-3">
                    <label for="form-label">Authors</label>
                    @foreach ($auth as $item)
                    <p class="form-control">{{ $item->S_ID }} || {{ $item->NAME }}</p>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>

        </div>
    </div>


</div>
