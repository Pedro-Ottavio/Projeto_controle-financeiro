<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Controle Financeiro</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('transacoes.index') }}">Transações</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('metas.index') }}">Metas Financeiras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
            
                <li class="nav-item">
                    <a id="hiddenButton" class="nav-link hidden-button" style="display: none" onclick="location.href='{{ route('listagem') }}'">Listagem</a>
                </li>     

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('loginForm') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('registroForm') }}">Registrar</a>
                </li>
            @else
                <li class="nav-item">
                    <a id="hiddenButton" class="nav-link hidden-button" style="display: none" onclick="location.href='{{ route('listagem') }}'">Listagem</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>
    </div>
</nav>
