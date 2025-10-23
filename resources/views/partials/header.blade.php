<header class="header bg-primary py-3"> {{-- 'bg-primary' do Bootstrap para tom azul suave [2.a.ii] --}}
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <a class="navbar-brand" href="{{ url('/') }}">
                INVENTÁRIO DE DOCUMENTOS E PROCESSOS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-crud-target="unidade-custodia">Unidade de Custódia</a> {{-- [2.1.i] --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-crud-target="municipio-custodia">Município de Custódia</a> {{-- [2.1.ii] --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-crud-target="tipo-processo">Tipo de Processo</a> {{-- [2.1.iii] --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-crud-target="tipo-volume">Tipo de Volume</a> {{-- [2.1.iv] --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-crud-target="classificacao-temporalidade">Classificação Temporalidade</a> {{-- [2.1.v] --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-crud-target="tamanho-folha">Tamanho de Folha</a> {{-- [2.1.vi] --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-crud-target="valor-historico">Valor Histórico</a> {{-- [2.1.vii] --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-crud-target="estado-conservacao">Estado de Conservação</a> {{-- [2.1.viii] --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-crud-target="documento-processo">Docto e Processo</a> {{-- [2.1.ix] --}}
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
