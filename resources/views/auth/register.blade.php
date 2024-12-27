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
    <div class="container-fluid vh-100 d-flex bg-light justify-content-center align-items-center">

        <form action="/register" method="POST" class="bg-white shadow w-25 h-auto p-5 rounded">
            @csrf
            <h3 class="text-center font-weight-bold mb-5">Register</h3>
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                @error('username')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
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
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3 cursor-pointer">Create User</button>
            <p class="text-sm text-primary text-center">
                <a href="/login" class="link-underline link-underline-opacity-0">Already have an acoount?</a>
            </p>
        </form>
    </div>
</body>

</html>
