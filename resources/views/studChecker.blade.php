@extends('layout.dashboardLayout')

@section('title')
    Student Dashboard
@endsection

@section('topnav')
    <ul class="nav nav-pills flex-column mt-4">
        <li class="nav-item py-2 py-sm-0">
            <a href="{{ route('studentt.index') }}" class="nav-link text-white "><i class="fs-5 fa fa-house"></i><span
                    class="fs-4 d-none ms-2 d-sm-inline">Dashboard</span></a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a href="{{ route('studentt.myArchive') }}" class="nav-link text-white"><i class="fs-5 fa fa-box-archive"></i><span
                    class="fs-4 d-none ms-2 d-sm-inline">My Archive</span></a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a href="{{ route('studentt.Checker') }}" class="nav-link text-white active" aria-current="true"><i
                    class="fs-5 fa fa-check"></i><span class="fs-4 d-none ms-2 d-sm-inline">Checker</span></a>
        </li>
    </ul>
@endsection

@section('main')

    <form action="{{ route('studentt.words') }}" method="POST">
        @csrf
        <div class="form-group">

            <label for="user_input">Enter a your title:</label>
            @if (!isset($titel))
                <input class="form-control" type="text" name="user_input" id="user_input">
            @else
                <input class="form-control" type="text" name="user_input" id="user_input" value="{{ $titel }}">
            @endif
        </div>


        <div class="form-group">

            <label for="abs">Enter a your abstract:</label>
            @if (!isset($absract))
                <textarea class="form-control" type="text" name="abs" id="abs" rows="3"></textarea>
            @else
                <textarea class="form-control" type="text" name="abs" id="abs" rows="3">{{ $absract }}</textarea>
            @endif

        </div>







        <br>

        <button type="submit" class="btn btn-primary ">Find</button>
    </form>


    <br>
    @if (isset($similarTitles) && count($similarTitles) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Similar Titles</th>
                    <th scope="col">Similarity Percentage</th>
                    <th scope="col">Similar Words</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($similarTitles as $similarTitle)
                    <tr>
                        <th scope="row">{{ $similarTitle['title'] }}</th>
                        <th scope="row">{{ $similarTitle['average_similarity_percentage'] }}%</th>


                        <th scope="row">
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
        <strong >No similar titles found!</strong>
    @endif
    </div>
    </div>
    </div>
@endsection
