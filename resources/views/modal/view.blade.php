<div class="mb-3">
    <label for="archID" class="form-label">Archive ID</label>
    <p type="text" class="form-control" placeholder="Enter Archive ID" id="archID" name="ARCH_ID">
        {{ $archive->ARCH_ID }} </p>

</div>

<div class="mb-3">

    <label for="name" class="form-label">Archive name</label>
    <p class="form-control" type="text" name="ARCH_NAME"> {{ $archive->ARCH_NAME }}</p>


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
    <p class="form-control" read-only=true>{{ $archive->ABSTRACT }}</p>

</div>
<div class="mb-3">
    <label for="form-label">Authors</label>
    @foreach ($auth as $item)
        <p class="form-control">{{ $item->S_ID }} || {{ $item->NAME }}</p>
    @endforeach
</div>
