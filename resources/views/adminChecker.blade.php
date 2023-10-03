@extends('layout.dashboardLayout')

@section('title')
    Title Checker
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="inactive">
        Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="inactive">Archives</a>
    <a href="{{ route('admin.checker') }}" class="active">Checker</a>
    <a href="{{ route('admin.student') }}" class="inactive">Student</a>
    <a href="{{ route('admin.faculty') }}" class="inactive">Faculty</a>
    <a href="{{ route('admin.admin') }}" class="inactive">Admin</a>
@endsection

@section('main')

    <div class="checker">
        
        <div class="frm">
            <div class="chkContainier">
                <form action="{{ route('admin.words') }}" method="POST">
                    @csrf
                    <div class="formGroup">
                        <label for="user_input">Enter a your title:</label>
                        <input class="formControl" type="text" name="user_input" id="user_input">
                    </div>
                    <div class="formGroup">
                        <label for="abs">Enter a your abstract:</label>
                        <textarea class="abstract" type="text" name="abs" id="abs"></textarea>
                    </div>
                    <button type="submit" class="btn btnSecondary">Find</button>
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
