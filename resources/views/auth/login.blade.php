<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth Facades</title>
    @vite(['resources/sass/styles.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid bg-light vh-100 d-flex justify-content-center align-items-center">
        <form action="/login" method="POST" class="bg-white shadow w-25 h-auto p-5 rounded">
            @csrf
            <h3 class="text-center font-weight-bold mb-5">Login</h3>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
            <p class="text-sm text-primary text-center">
                <a href="/register" class="link-underline link-underline-opacity-0">Don't have an account yet?</a>
            </p>
        </form>
    </div>

</body>

</html>
