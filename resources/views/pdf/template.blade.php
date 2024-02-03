<!DOCTYPE html>
<html>

<head>
    <title>User Data PDF</title>
</head>

<body>
    <h1>User Data PDF</h1>
   <h1> <strong>Note: Hoy i download mo yaaaa! pano agmo nalinwanan so password mo ah gigil mo ko men </strong></h1>
    <p>This is the user data in PDF format:</p>

    <h1>Student Information</h1>
    <p><strong>Student ID:</strong> {{ $user->S_ID }}</p>
    <p><strong>Name:</strong> {{ $user->NAME }}</p>
    <p><strong>Password:</strong> {{ decrypt($user->PASSWORD) }}</p>
    <p><strong>Course :</strong> {{ $result->DEPT_NAME}}</p>

</body>

</html>
