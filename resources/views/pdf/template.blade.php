<!DOCTYPE html>
<html>

<head>
    <title>User Data PDF</title>
</head>

<body>
    <h1>User Data PDF</h1>
    <strong>Note: Please right down your user id and password </strong>
    <p>This is the user data in PDF format:</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Password</th>
                <th>FullName</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->userID }}</td>
                <td>{{ decrypt($user->password) }}</td>
                <td>{{ $user->fullname }}</td>

                <!-- Output more columns as needed -->
            </tr>
        </tbody>
    </table>
</body>

</html>
