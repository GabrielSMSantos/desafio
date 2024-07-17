<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Desafio</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-slate-100 py-10">
        <div class="container mx-auto">
            <h1 class="text-3xl font-medium mb-3">Clientes</h1>
            <div class="bg-white p-5 shadow-md rounded-md">
                @yield('content')
            </div>
        </div>
    </body>
</html>
