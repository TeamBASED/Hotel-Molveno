<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Molveno</title>

    @vite('resources/css/app.css')

    {{ $resources ?? '' }}

</head>
<body>
    <!-- header import -->
    <x-layout.header/>
    {{ $slot }}
</body>
</html>