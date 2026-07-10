<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Election Comission</title>
    <link rel="stylesheet" href="{{ asset("css/admincss/style.css") }}">
    <link rel="stylesheet" href="{{ asset("fontawesome/css/all.min.css") }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset("images/images.jpeg") }}">
</head>
<body>



    <main>
        {{ $slot }}
    </main>

    <script src="{{ asset("js/admin/index.js") }}"></script>
</body>
</html>
