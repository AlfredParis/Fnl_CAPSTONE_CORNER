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
    <div class="checker">
        <div class="frm">
            <div class="chkContainier">
                <form action="{{ route('admin.updateArch', ['ARCH_ID' => $archive->ARCH_ID]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="formGroup">
                        <label for="archID">Archive ID</label>
                        <input class="form-control" type="text" id="archID" name="archID"
                            value="{{ old('archID', $archive->ARCH_ID) }} " required>
                    </div>
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror
                    <div class="formGroup">
                        <label for="name">Archive name</label>
                        <input class="form-control" type="text" name="name"
                            value="{{ old('name', $archive->ARCH_NAME) }}" id="name" required>
                    </div>
                    {{-- @error('')
                <span> {{ $message }}</span>
            @enderror

            <div class="formGroup">
                <label for="author">author</label>
                <input class="form-control" type="text" name="author" value="{{ old('author', $archive->author) }}"
                    id="author" required>
            </div> --}}
                    @error('')
                        <span> {{ $message }}</span>
                    @enderror

                    <div class="formGroup">
                        <label for="gh">GitHub Link</label>
                        <input class="form-control" type="text" name="gh"
                            value="{{ old('gh', $archive->GITHUB_LINK) }}" id="gh" required>
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
        <div class="check">
            <div class="chktable-wrapper">


                @if (isset($similarTitles) && count($similarTitles) > 0)
                    <table class="fl-chktable">
                        <thead>
                            <tr>
                                <th>Similar Titles</th>
                                <th>Similarity Percentage</th>
                                <th>Similar Words</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($similarTitles as $similarTitle)
                                <tr>
                                    <th>{{ $similarTitle['title'] }}</th>
                                    <th>{{ $similarTitle['average_similarity_percentage'] }}%</th>


                                    <th>
                                        @if (count($similarTitle['similar_words']) > 0)
                                            <ul>
                                                @foreach ($similarTitle['similar_words'] as $similarWord)
                                                    <li>{{ $similarWord }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            No similar words found.
                                        @endif
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <strong class="chtitle">No similar titles found!</strong>
                @endif
            </div>
        </div>
    </div>
@endsection
