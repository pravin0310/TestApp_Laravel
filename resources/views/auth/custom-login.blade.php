<!DOCTYPE html>
<html>

<head>
    <title>Custom Login</title>
</head>

<body>
    <form method="POST" action="{{ route('custom.login') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
        @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
    </form>
</body>

</html>