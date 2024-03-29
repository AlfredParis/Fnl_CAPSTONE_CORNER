@extends('layout.dashboardLayout')

@section('title')
Student Dashboard
@endsection

@section('topnav')
<a href="{{ route('studentt.index') }}" class="inactive">Dashboard</a>
<a href="{{ route('studentt.myArchive') }}" class="actives">My Archive</a>
<a href="{{ route('studentt.Checker') }}" class="inactive">Checker</a>
<li class="nav-item py-2 py-sm-0">
    <a href="{{ route('studentt.archives') }}" class="nav-link text-white active"><i class="fs-7 fa fa-check"></i><span
            class="fs-6 d-none ms-2 d-sm-inline">archives</span></a>
</li>
@endsection

@section('main')
<div class="chkContainier">
    <p class="text-style">Archive Add Form</p>
    <form class="" action="{{ route('studentt.storeArch') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="form-group">
            <label for="name">Archive Title</label>
            <input type="text" class="form-control" placeholder="Enter Title" name="name" value="{{ old('name') }}"
                required>
        </div>
        <div class="formGroup">
            <label for="abs">Enter a your abstract:</label>
            <textarea class="abstract" type="text" name="abs" id="abs"></textarea>
        </div>



        <div class="form-group">
            <label for="pdf">Documentation</label>
            <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" value="{{ old('pdf_file') }}"
                id="pdf">

        </div>


        <div class="form-group">
            <label for="gh">GitHub Repository</label>
            <input type="text" class="form-control" placeholder="Enter Link" name="gh" id="gh" value="{{ old('gh') }}">

        </div>

        <div style="text-align: center">
            <button type="submit" class="btn btn-primary">Add Archive</button>
            <br>
        </div>

    </form>
</div>
<br>
@endsection