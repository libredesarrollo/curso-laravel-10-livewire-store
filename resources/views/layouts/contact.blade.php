<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>


<body>
    <div class="container">
        {{ $slot }}
    </div>
    @livewireScripts
</body>


</html>
