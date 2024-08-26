@extends('layout.dashboardLayout')

@section('title')
Admin Dashboard
@endsection

@section('topnav')
<a href="{{ route('admin.archives') }}" class="inactive">Return</a>
@endsection

@section('main')

<p class="text-style">Archive Add Form</p>
<form class="" action="{{ route('admin.storeArch') }}" method="POST" enctype="multipart/form-data">

    @csrf


    <div class="mb-3">
        <label for="name" class="form-label">Archive Title</label>
        <input type="text" class="form-control" placeholder="Enter Title" name="name" value="{{ old('name') }}"
            required>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3">
        <label for="Author" class="form-label">Author</label>

        <select name="countries[]" id="countries" multiple>
            @foreach ($auths as $archive)
            <option value="{{ $archive->S_ID }}">{{ $archive->S_ID }}</option>
            @endforeach
        </select>

    </div>


    <div class="mb-3">
        <label for="pdf" class="form-label">Documentation</label>
        <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" value="{{ old('pdf_file') }}"
            id="pdf">

    </div>


    <div class="mb-3">
        <label for="gh" class="form-label">GitHub Repository</label>
        <input type="text" class="form-control" placeholder="Enter Link" name="gh" id="gh" value="{{ old('gh') }}">

    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="GitHub Repository" aria-label="GitHub Repository"
            aria-describedby="basic-addon2">
        <span class="input-group-text" id="basic-addon2">@example.com</span>
    </div>

    <div class="dropdown">
        <label for="Status" class="form-label">Status:</label>
        <select id="stat" name="stat" class="form-select" aria-label="Default select example">
            <option value="approved">approved</option>
            <option value="not approved">not approved</option>

        </select>



    </div>


    </div>
    </div>
    <div class="check">
        <br>
        {{-- <div class="formGroup">
            <label for="abs">Enter a your abstract:</label>
            <textarea class="abstract" type="text" name="abs" id="abs"></textarea>
        </div> --}}
        <div style="text-align: center">
            <button type="submit" class="btn btn-primary">Add Archive</button>
            <br>

        </div>
    </div>


    </div>
</form>
<script>
    new MultiSelectTag('countries') // id
</script>
@endsection