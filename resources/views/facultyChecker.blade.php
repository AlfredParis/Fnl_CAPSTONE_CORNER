@extends('layout.dashboardLayout')

@section('title')
    Faculty Checker
@endsection

@section('topnav')
    <ul class="nav nav-pills flex-column mt-4" style="gap: 1vh;">
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white" href="{{ route('faculty.index') }}">
                <i class="fs-7 fa fa-house"></i><span class="fs-7 d-none ms-2 d-sm-inline">Dashboard</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white " href="{{ route('faculty.myArchive') }}">
                <i class="fs-7 fa fa-box-archive"></i><span class="fs-7 d-none ms-2 d-sm-inline">Archives</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white active" aria-current="true" href="{{ route('faculty.Checker') }}">
                <i class="fs-7 fa fa-check"></i><span class="fs-7 d-none ms-2 d-sm-inline">Checker</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white " href="{{ route('faculty.student') }}">
                <i class="fs-7 fa fa-user-graduate"></i><span class="fs-7 d-none ms-2 d-sm-inline">Student</span>
            </a>
        </li>
        <li class="nav-item py-2 py-sm-0">
            <a class="nav-link text-white " aria-current="true" href="{{ route('faculty.student') }}">
                <i class="fs-7 fa fa-users-rectangle"></i><span class="fs-7 d-none ms-2 d-sm-inline">Advisory</span>
            </a>
        </li>
    </ul>
@endsection

@section('main')

    <form action="{{ route('faculty.words') }}" method="POST">
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
        <strong>No similar titles found!</strong>
    @endif

@endsection
