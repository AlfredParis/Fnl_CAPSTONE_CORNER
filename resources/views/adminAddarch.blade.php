@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    <a href="{{ route('admin.archives') }}" class="inactive">Return</a>
@endsection

@section('main')
<br> <br> <br> <br>
    <p class="text-style">Archive Add Form</p>
    <form class="" action="{{ route('admin.storeArch') }}" method="POST" enctype="multipart/form-data">
        <div class="checkers">

            <div class="frm">

                <div class="chkContainier">

                    @csrf


                    <div class="formGroup">
                        <label for="name">Archive Title</label>
                        <input type="text" class="formControl" placeholder="Enter Title" name="name"
                            value="{{ old('name') }}" required>
                    </div>

                    <div class="formGroup">
                        <label for="Author">Author</label>
                        {{-- <input type="text" class="formControl" placeholder="Enter Author/s" name="author" id="myInput"
                            value="{{ old('Author') }}" required> --}}
                        {{-- <input type="text" id="suggestionInput" autocomplete="off" name="author" placeholder="Enter authors">
                <div id="suggestionList"></div> --}}
                        <select name="countries[]" id="countries" multiple>
                            @foreach ($auths as $archive)
                                <option value="{{ $archive->S_ID }}">{{ $archive->S_ID }}</option>
                            @endforeach
                        </select>

                    </div>


                    <div class="formGroup">
                        <label for="pdf">Documentation</label>
                        <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf"
                            value="{{ old('pdf_file') }}" id="pdf">

                    </div>


                    <div class="formGroup">
                        <label for="gh">GitHub Repository</label>
                        <input type="text" class="formControl" placeholder="Enter Link" name="gh" id="gh"
                            value="{{ old('gh') }}">

                    </div>

                    <div class="formGroup">
                        <label for="Status">Status:</label>
                        <select id="stat" name="stat">
                            <option value="approved">approved</option>
                            <option value="not approved">not approved</option>

                        </select>



                    </div>


                </div>
            </div>
            <div class="check">
                <br>
                <div class="formGroup">
                    <label for="abs">Enter a your abstract:</label>
                    <textarea class="abstract" type="text" name="abs" id="abs"></textarea>
                </div>
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
