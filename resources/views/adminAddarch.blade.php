@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    <a href="{{ route('admin.archives') }}" class="inactive">Return</a>
@endsection

@section('main')
    <p class="text-style">Archive Add Form</p>

    <div class="chkContainier">
        <form class="" action="{{ route('admin.storeArch') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- <div class="form-group">
                <label for="archID">Archive ID</label>
                <input type="text" class="form-control" placeholder="Enter ID" name="archID" value="{{ old('archID') }}"
                    required>
            </div> --}}

            <div class="form-group">
                <label for="name">Archive Title</label>
                <input type="text" class="form-control" placeholder="Enter Title" name="name"
                    value="{{ old('name') }}" required>
            </div>
            <div class="formGroup">
                <label for="abs">Enter a your abstract:</label>
                <textarea class="abstract" type="text" name="abs" id="abs"></textarea>
            </div>
            <div class="form-group">
                <label for="Author">Author</label>
                <input type="text" class="form-control" placeholder="Enter Author/s" name="author" id="myInput"
                    value="{{ old('Author') }}" required>
                {{-- <input type="text" id="suggestionInput" autocomplete="off" name="author" placeholder="Enter authors">
                <div id="suggestionList"></div> --}}
            </div>


            <div class="form-group">
                <label for="pdf">Documentation</label>
                <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" value="{{ old('pdf_file') }}"
                    id="pdf">

            </div>


            <div class="form-group">
                <label for="gh">GitHub Repository</label>
                <input type="text" class="form-control" placeholder="Enter Link" name="gh" id="gh"
                    value="{{ old('gh') }}">

            </div>

            <div class="form-group">
                <label for="Status">Status:</label>
                <select id="stat" name="stat">
                    <option value="approved">approved</option>
                    <option value="not approved">not approved</option>

                </select>



            </div>


            <div style="text-align: center">
                <button type="submit" class="btn btn-primary">Add Archive</button>
                <br>


        </form>
    </div>
    </div>
@endsection
