<!DOCTYPE html>
<html>

<head>
    <title>User Data PDF</title>
</head>

<body>
    <h1>User Data PDF</h1>
    <strong>Note: Please dowload this PDF or right down your user id and password </strong>
    <p>This is the user data in PDF format:</p>

    <h1>Student Information</h1>
    <p><strong>Student ID:</strong> {{ $user->S_ID }}</p>
    <p><strong>Name:</strong> {{ $user->NAME }}</p>
    <p><strong>Course ID:</strong> {{ $user->C_ID }}</p>
    <p><strong>Course ID:</strong> {{ $result->C_DESC}}</p>
    {{-- <h2>Course Descriptions:</h2> --}}
    {{-- <ul>
        @foreach($result as $course)
            <li>{{ $course->C_DESC }}</li>
        @endforeach
    </ul> --}}
</body>

</html>
