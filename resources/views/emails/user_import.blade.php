<!-- resources/views/emails/user_import.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
</head>

<body>
    <p>Hello {{ $user->firstName }} {{ $user->lastName }},</p>
    <p>Your account has been created. Please use the following credentials to log in:</p>
    <p>Email: {{ $user->email }}</p>
    <p>Password: {{ $password }}</p>
    <p><a href="{{ url('/login') }}">Login here</a></p>
</body>

</html>