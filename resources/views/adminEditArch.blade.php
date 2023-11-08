@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    <a href="{{ route('admin.archives') }}" class="inactive">Return</a>
@endsection

@section('main')
<br><br><br>
    <p class="text-style">Archive Edit Form</p>
    <form action="{{ route('admin.updateArch', ['ARCH_ID' => $archive->ARCH_ID]) }}" method="POST">

        <div class="checker">
            <div class="frm">
                <div class="chkContainier">

                    @csrf
                    @method('PUT')
                    <div class="formGroup">
                        <label for="archID">Archive ID</label>
                        <input class="formControl" type="text" id="archID" name="archID"
                            value="{{ old('ARCH_ID', $archive->ARCH_ID) }} " required>
                    </div>
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror
                    <div class="formGroup">
                        <label for="name">Archive name</label>
                        <input class="formControl" type="text" name="name"
                            value="{{ old('ARCH_NAME', $archive->ARCH_NAME) }}" id="name" required>
                    </div>
                    {{-- @error('')
                <span> {{ $message }}</span>
            @enderror

            <div class="formGroup">
                <label for="author">author</label>
                <input class="formControl" type="text" name="author" value="{{ old('author', $archive->author) }}"
                    id="author" required>
            </div> --}}
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror

                    <div class="formGroup">
                        <label for="gh">GitHub Link</label>
                        <input class="formControl" type="text" name="gh"
                            value="{{ old('GITHUB_LINK', $archive->GITHUB_LINK) }}" id="gh" required>
                    </div>
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror



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

                    <textarea class="abstract" type="text" name="abs" id="abs">{{ old('ABSTRACT', $archive->ABSTRACT) }}</textarea>
                </div>
                <div style="text-align: center">
                    <button type="submit" class="btn btn-primary">Update Archive</button>
                    <br>

                </div>
            </div>



        </div>
    </form>
@endsection
