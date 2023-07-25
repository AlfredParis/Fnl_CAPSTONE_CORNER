@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    <a href="{{ route('admin.archives') }}" class="inactive">Return</a>
@endsection

@section('main')
    <p class="text-style"> Archive Add Form</p>
    <br>
    <div class="container">
        <form class="" action="{{ route('admin.storeArch') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="archID">Archive ID</label>
                <input type="text" class="form-control" placeholder="Enter ID" name="archID" value="{{ old('archID') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="name">Archive Title</label>
                <input type="text" class="form-control" placeholder="Enter Title" name="name"
                    value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="Author">Author</label>
                <input type="text" class="form-control" placeholder="Enter Author/s" name="author" id="myInput"
                    value="{{ old('Author') }}" required>
            </div>

            <div class="form-group">
                <label for="pdf">GitHub Repository</label>
                <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" value="{{ old('gh') }}"
                    id="pdf" required>

            </div>


            <div class="form-group">
                <label for="gh">GitHub Repository</label>
                <input type="text" class="form-control" placeholder="Enter Link" name="gh" id="gh"
                    value="{{ old('gh') }}">

            </div>


            <div style="text-align: center">
                <button type="submit" class="btn btn-primary">Add Archive</button>
                <br>


        </form>
    </div>
    </div>
@endsection
