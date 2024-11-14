<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    /* Adicionar o Bootstrap no arquivo app.css */
    @import 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css';

    <title>Projeto Financeiro</title>

    <!-- Corrigir o link do arquivo CSS -->
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Corrigir o link do arquivo JS -->
    @vite('resources/js/app.js')
</body>
</html>
