@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
    <a href="{{ route('studentt.index') }}" class="inactive">Dashboard</a>
    <a href="{{ route('studentt.myArchive') }}" class="actives">My Archive</a>
    <a href="{{ route('studentt.Checker') }}" class="inactive">Checker</a>

@endsection

@section('main')



    <div class="chkContainier">
        <p class="text-style">Archive Add Form</p>
        <form class="" action="{{ route('studentt.storeArch') }}" method="POST" enctype="multipart/form-data">
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
            {{-- <div class="form-group">
                <label for="Author">Author</label>
                <input type="text" class="form-control" placeholder="Enter Author/s" name="author" id="myInput"
                    value="{{ old('Author') }}" required>
                <input type="text" id="suggestionInput" autocomplete="off" name="author" placeholder="Enter authors">
                <div id="suggestionList"></div>
            </div> --}}


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

            <div style="text-align: center">
                <button type="submit" class="btn btn-primary">Add Archive</button>
                <br>
  </div>

        </form>
    </div>
<br>
@endsection
