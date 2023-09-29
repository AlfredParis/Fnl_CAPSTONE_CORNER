@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
    <a href="{{ route('studentt.index') }}" class="inactive">dashboard</a>
    <a href="{{ route('studentt.myArchive') }}" class="inactive">My Archive</a>
    <a href="{{ route('studentt.Checker') }}" class="active">Checker</a>
@endsection

@section('main')
    
    <div class="checker">
        <div class="hid">
            <div class="chtitle">Title Checker <br></div>
      
                @if (isset($titel))
                    <h1> <strong>Your title:</strong> {{ $titel }}</h1>
                @else
                <h1> <strong>Your title:</strong> No input title.</h1>
                @endif

  </div>
        <div class="frm">
            <div class="containier">
                <form action="{{ route('studentt.words') }}" method="POST">
                    @csrf
                    <div class="formGroup">
                        <label for="user_input">Enter a your title</label>
                        <input class="formControl" type="text" name="user_input" id="user_input">
                    </div>
                    <button type="submit" class="btn btnSecondary">Find</button>
                </form>
            </div>
        </div>
        <div class="check">
            <div class="table-wrapper">
                {{-- @if (isset($titel))
                    <h1>Your Title: {{ $titel }}</h1>
                @endif --}}


                @if (isset($similarTitles) && count($similarTitles) > 0)
                    <table class="fl-table">
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
                                    <th class="simTitle">{{ $similarTitle['title'] }}</th>
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
