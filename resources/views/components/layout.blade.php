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
        <x-navbar />
        {{ $slot }}
    </div>
</body>

</html>
