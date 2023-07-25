@extends('layout.dashboardLayout')

@section('title')
    Admin Dashboard
@endsection

@section('topnav')
    <a href="{{ route('admin.archives') }}" class="inactive">Return</a>
@endsection

@section('main')
    <p class="text-style">Archive Edit Form</p>

    <br>
    <div class="container">
        <form action="{{ route('admin.updateArch', ['id' => $archive->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="archID">Archive ID</label>
                <input class="form-control" type="text" id="archID" name="archID"
                    value="{{ old('archID', $archive->archID) }} " required>
            </div>
            @error('')
                <span> {{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="name">Archive name</label>
                <input class="form-control" type="text" name="name" value="{{ old('name', $archive->name) }}"
                    id="name" required>
            </div>
            @error('')
                <span> {{ $message }}</span>
            @enderror

            <div class="form-group">
                <label for="author">author</label>
                <input class="form-control" type="text" name="author" value="{{ old('author', $archive->author) }}"
                    id="author" required>
            </div>
            @error('')
                <span> {{ $message }}</span>
            @enderror

            <div class="form-group">
                <label for="gh">GitHub Link</label>
                <input class="form-control" type="text" name="gh" value="{{ old('gh', $archive->gh) }}"
                    id="gh" required>
            </div>
            @error('')
                <span> {{ $message }}</span>
            @enderror


            <br><br><br>
            <div style="text-align: center">
                <input class="btn btn-primary" type="submit" name="submit" value="SAVE!"><br>

        </form>
    </div>
    </div>
@endsection
