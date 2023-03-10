<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Molveno</title>

    @vite('resources/scss/main.scss')

    {{ $resources ?? '' }}

</head>
<body>
    <x-layout.header/>

    {{ $slot }}

</body>
</html>