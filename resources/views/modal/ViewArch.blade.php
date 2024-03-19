<div class="modal fade" id="archView{{ $archive->ARCH_ID }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Archive view</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @php
                $auth=\App\Models\STUDENT::where('GROUP_ID', $archive->GROUP_ID)->get();

                @endphp

                <div class="mb-3">
                    <label for="archID" class="form-label">Archive ID</label>
                    <p type="text" class="form-control" placeholder="Enter Archive ID" id="archID" name="ARCH_ID">
                        {{ $archive->ARCH_ID }} </p>

                </div>
                <div class="mb-3">
                    <label for="archID" class="form-label">Archive Title</label>
                    <p type="text" class="form-control" placeholder="Enter Archive ID" id="archID" name="ARCH_ID">
                        {{ $archive->TITLE}} </p>

                </div>
                <div class="mb-3">

                    <label for="name" class="form-label">Group Name</label>
                    <p class="form-control" type="text" name="ARCH_NAME">{{ $grp_name}}
                    </p>
                </div>
                <div class="mb-3">

                    <label for="name" class="form-label">Group Adviser</label>
                    <p class="form-control" type="text" name="ARCH_NAME">{{ $adviserName}}
                    </p>
                </div>
                <div class="mb-3">
                    <label for="gh" class="form-label">Documentation</label><br>
                    <a href="#" onclick="openPDF('{{ asset('storage/pdfs/' . $archive->DOCU) }}');"
                        class="btn btn-primary">Open Document </a>
                </div>


                <div class="mb-3">
                    <label for="form-label">Abstract</label>
                    <p class="form-control" read-only=true>{{ $archive->ABS}}</p>

                </div>
                <div class="mb-3">
                    <label for="form-label">Authors</label>
                    @foreach ($auth as $item)
                    <p class="form-control">{{ $item->NAME }}</p>
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