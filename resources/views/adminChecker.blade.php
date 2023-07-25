@extends('layout.dashboardLayout')

@section('title')
    Title Checker
@endsection

@section('topnav')
    <a href="{{ route('admin.index') }}" class="inactive">Dashboard</a>
    <a href="{{ route('admin.archives') }}" class="inactive">Archives</a>
    <a href="{{ route('admin.checker') }}" class="active">Checker</a>
    <a href="{{ route('admin.student') }}" class="inactive">Student</a>
    <a href="{{ route('admin.faculty') }}" class="inactive">Faculty</a>
    <a href="{{ route('admin.admin') }}" class="inactive">Admin</a>
@endsection

@section('main')
    <br>

    <h1>Archive Search</h1>

    <form action="{{ route('admin.words') }}" method="POST">
        @csrf
        <label for="user_input">Enter a word:</label>
        <input type="text" name="user_input" id="user_input">
        <button type="submit">Find Similar Sentences</button>
    </form>

    @if (isset($similarSentences) && count($similarSentences) > 0)
        <h2>Similar Sentences:</h2>
        <ul>
            @foreach ($similarSentences as $sentence)
                <li>
                    <p>{{ $sentence['sentence'] }}</p>
                    <p>Similar Words:</p>
                    <ul>
                        @foreach ($sentence['similar_words'] as $word)
                            <li>{{ $word }}</li>
                        @endforeach
                    </ul>
                    <p>Similarity Percentage: {{ $sentence['similarity_percentage'] }}%</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
