<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Controle Financeiro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    
    <style>
        /* Flexbox layout to push footer down */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        .container {
            flex: 1;
            padding-bottom: 60px; /* Adjust this value based on footer height */
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: auto; /* Push the footer to the bottom */
        }

        /* Style for the hidden button */
        .hidden-button {
            display: block; /* Keeps the button hidden */
        }

        .fixed-bottom-right {
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 1000;
            color: #343a40;
        }
        .credito {
            color: green;
        }

        .debito {
            color: red;
        }

    </style>
</head>
<body>

    @include('partials.navbar')
    <div class="container">
        @yield('content')
        <!-- Hidden button for Listagem access -->
        <a href="{{ route('listagem') }}" id="hiddenButton" class="hidden-button fixed-bottom-right">Listagem</a>
    </div>
    
    <!-- Footer Section -->
    <footer>
        <p>&copy;2024 Sistema de Controle Financeiro. Todos os direitos reservados. <br> Desenvolvido por OTTA</p>
        <p><a href="https://www.linkedin.com/in/pedrootavio-f-p" class="text-white">Contato</a> | <a href="#" class="text-white">Sobre</a></p>
    </footer>
</body>
</html>
