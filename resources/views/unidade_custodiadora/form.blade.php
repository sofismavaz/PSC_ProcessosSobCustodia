@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Gerenciar Unidade de Custódia</div>
    <div class="card-body">
        <form id="unidadeCustodiaForm">
            <div class="mb-3">
                <label for="searchUnidade" class="form-label">Buscar Unidade de Custódia (ID ou Nome)</label>
                <input type="text" class="form-control rounded-input" id="searchUnidade" placeholder="Digite para buscar..."> {{-- Campo de busca [2.3.i], borda arredondada [2.a.iv] --}}
                <small class="form-text text-muted">Use este campo para buscar ou deixe vazio para inserir um novo registro.</small>
            </div>

            <div class="mb-3">
                <label for="unidadeCustodiadora" class="form-label">Unidade de Custodiadora</label>
                <input type="text" class="form-control rounded-input" id="unidadeCustodiadora" name="unidadeCustodiadora" required disabled> {{-- Campos desabilitados inicialmente [2.3.i.1], borda arredondada [2.a.iv] --}}
            </div>
            <input type="hidden" id="unidadeId" name="id">
            <input type="hidden" id="autorRegistro" name="autorRegistro" value="{{ auth()->user()->name ?? 'Sistema' }}"> {{-- Preencher automaticamente com usuário logado ou default --}}
            <input type="hidden" id="dataHoraRegistro" name="dataHoraRegistro" value="{{ date('Y-m-d H:i:s') }}"> {{-- Preencher automaticamente --}}

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="window.location='{{ url('/') }}'">Voltar ao Menu Principal</button> {{-- [2.3.iii] --}}
                <button type="submit" class="btn btn-primary" id="saveButton" disabled>Gravar</button> {{-- [2.3.iv] --}}
            </div>
        </form>
        <div id="searchResults" class="mt-3">
            {{-- Resultados da busca serão exibidos aqui --}}
        </div>
    </div>
</div>
@endsection