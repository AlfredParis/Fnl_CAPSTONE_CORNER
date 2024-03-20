@extends('layout.dashboardLayout')

@section('title')
Student Dashboard
@endsection

@section('topnav')
<ul class="nav nav-pills flex-column mt-4 gap-1">
    <li class="nav-item py-2 py-sm-0">
        <a href="{{ route('studentt.index') }}" class="nav-link text-white "><i class="fs-7 fa fa-house"></i><span
                class="fs-6 d-none ms-2 d-sm-inline">Dashboard</span></a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a href="{{ route('studentt.group') }}" class="nav-link text-white"><i class="fs-7 fa fa-user-group"></i><span
                class="fs-6 d-none ms-2 d-sm-inline">Group</span></a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a href="{{ route('studentt.Checker') }}" class="nav-link text-white active" aria-current="true"><i
                class="fs-7 fa fa-check"></i><span class="fs-6 d-none ms-2 d-sm-inline">Checker</span></a>
    </li>
    <li class="nav-item py-2 py-sm-0">
        <a href="{{ route('studentt.archives') }}" class="nav-link text-white"><i class="fs-7 fa fa-book"></i><span
                class="fs-6 d-none ms-2 d-sm-inline">archives</span></a>
    </li>
</ul>
@endsection

@section('main')
<div class="pddingForBody">
    <form action="{{ route('studentt.words') }}" method="POST">
        @csrf
        <div class="form-group">

            <label for="user_input">Enter a your title:</label>
            @if (!isset($titel))
            <input class="form-control" type="text" name="user_input" id="user_input" required>
            @else
            <input class="form-control" type="text" name="user_input" id="user_input" value="{{ $titel }}" required>
            @endif
        </div>


        <div class="form-group">

            <label for="abs">Enter a your abstract:</label>
            @if (!isset($absract))
            <textarea class="form-control" type="text" name="abs" id="abs" rows="3" required></textarea>
            @else
            <textarea class="form-control" type="text" name="abs" id="abs" rows="3" required>{{ $absract }}</textarea>
            @endif

        </div>







        <br>

        <button type="submit" class="btn btn-primary ">Find</button>
    </form>


    <br>
    @if (isset($similarTitles) && count($similarTitles) > 0)

    <table class="table table-striped">
        <thead>
            <th scope="col">Archive ID</th>
            <th scope="col">Similar Titles</th>
            <th scope="col">Similarity Percentage</th>
            <th scope="col">view</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($similarTitles as $similarTitle)
            @php
            $adviserName=\App\Models\EMPLOYEE::where('EMP_ID',$similarTitle['ADVISER_ID'])->value("NAME");
            $grp_name=\App\Models\group::where('id', $similarTitle['GROUP_ID'])->value("GRP_NAME");
            $dept=\App\Models\department::where('id', $similarTitle['DEPT_ID'])->value("DEPT_NAME");
            $archive=\App\Models\TURNED_OVER_ARCHIVES::where('id', $similarTitle['id'])->first();
            @endphp
            <tr>

                <td> {{ $similarTitle['ARCH_ID']}}</td>

                <th scope="row">{{ $similarTitle['title'] }}
                </th>

                <th scope="row">{{ $similarTitle['average_similarity_percentage'] }}%</th>

                <td scope="row">
                    <a class="btn" href="#archView{{ $archive->ARCH_ID }}" data-bs-toggle="modal"
                        onclick="incrementViewCount('{{ $archive->id }}')">
                        <i class="fa-solid fa-eye"></i></a>
                </td>

            </tr>

            <script>
                function incrementViewCount(archiveId) {
                            // Make an AJAX request to increment the view count
                            $.ajax({
                                url: `/viewCnt/${archiveId}`,
                                type: 'GET',
                                success: function(response) {
                                    console.log(response);
                                },
                                error: function(error) {
                                    console.error(error);
                                }
                            });
                        }
            </script>
            @include('modal.ViewArch')

            @endforeach
        </tbody>
    </table>
    @else
    <strong>No similar titles found!</strong>
    @endif
</div>


@endsection