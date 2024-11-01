<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Controle Financeiro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .hidden-button {
            display: none;
        }
        .fixed-bottom-right {
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 1000;
            color: #f8f9fa; /* Mesmo que a cor do fundo */
        }
    </style>
    <script>
        function showButton() {
            document.getElementById("hiddenButton").style.display = "block";
        }
    </script>
</head>
<body>
    @include('partials.navbar')
    <div class="container">
        @yield('content')

        <!-- Link para mostrar o botão oculto -->
        <a href="#" onclick="showButton()"  class="fixed-bottom-right">Listagem</a>
    </div>
</body>
</html>
