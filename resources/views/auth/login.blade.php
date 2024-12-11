<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <form action="{{ route('login') }}" method="POST">
    <h1>Login</h1>
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')<span>{{ $message }}</span>@enderror
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        @error('password')<span>{{ $message }}</span>@enderror
        <br>

        <button type="submit">Login</button>

        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
    </form>

</body>
</html>
