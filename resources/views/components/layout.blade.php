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
    <div class="container-lg">
        <nav class="navbar">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="#">Navbar</a>
                <div class="d-flex align-items-center">
                    <button type="submit" class="text-sm btn btn-link">Create Post</button>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="text-sm btn btn-link">Log Out</button>
                    </form>
                </div>
            </div>
        </nav>
        {{ $slot }}
    </div>
</body>

</html>
