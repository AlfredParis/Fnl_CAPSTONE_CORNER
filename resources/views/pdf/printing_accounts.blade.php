@extends('layout.forpdf')




@section('title')
    {{-- Data PDF for {{ $userac }} accounts --}}
@endsection

@section('main')
    {{-- <h1>Data PDF for {{ $userac }} accounts</h1> --}}
    <strong>Note: Please dowload this PDF or right down your user id and password </strong>
    <p>This is the user data in PDF format:</p> <br>

    <div class="table-wrapper">

        <table class="fl-table">
            <thead>
                <tr>
                    <th>Archive ID</th>
                    <th>Archive Title</th>
                    <th>Author/s</th>
                    <th> Documentation</th>
                    <th> GitHub Repository</th>
                    <th> View </th>
                    <th> Edit </th>
                    <th> Delete </th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($arch as $archive)
                    <tr>

                        <td>{{ $archive->archID }}</td>
                        <td>{{ $archive->name }}</td>
                        <td>{{ $archive->author }}</td>

                    </tr>
                @endforeach --}}
            </tbody>
        </table><br>

    </div>
@endsection
