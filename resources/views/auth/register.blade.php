<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <form action="{{ route('register') }}" method="POST">
    <h1>Register</h1>
        @csrf
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')<span>{{ $message }}</span>@enderror
        <br>

        <label for="id_library">ID Library:</label>
        <input type="text" name="id_library" id="id_library" value="{{ old('id_library') }}">
        @error('id_library')<span>{{ $message }}</span>@enderror
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')<span>{{ $message }}</span>@enderror
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        @error('password')<span>{{ $message }}</span>@enderror
        <br>

        <button type="submit">Register</button>

    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </form>
</body>
</html>
