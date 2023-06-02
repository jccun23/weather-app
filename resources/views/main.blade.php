<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Weather App</title>
        <script src="https://kit.fontawesome.com/6fc0690c3c.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="container-sm text-center">
            <div id="app" class="pt-3"></div>
        </div>
    </body>
</html>
