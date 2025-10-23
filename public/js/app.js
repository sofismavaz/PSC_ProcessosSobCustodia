// public/js/app.js

document.addEventListener('DOMContentLoaded', function() {
    const contentArea = document.getElementById('content-area');
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

    // Função para carregar formulários via AJAX [2.3]
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = this.dataset.crudTarget; // Ex: 'unidade-custodia'
            const url = `/${target}`; // Rota base para o formulário
            
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.text();
                })
                .then(html => {
                    contentArea.innerHTML = html; // Insere o formulário no corpo da página
                    initializeCrudForm(target); // Inicializa a lógica específica do formulário carregado
                })
                .catch(error => {
                    console.error('Erro ao carregar o formulário:', error);
                    contentArea.innerHTML = `<div class="alert alert-danger">Erro ao carregar o formulário de ${target}.</div>`;
                });
        });
    });

    // Função para inicializar a lógica de busca e formulário após o carregamento dinâmico
    function initializeCrudForm(target) {
        // Exemplo para Unidade de Custódia. Adaptar para outros formulários.
        if (target === 'unidade-custodia') {
            const searchInput = document.getElementById('searchUnidade');
            const unidadeCustodiadoraInput = document.getElementById('unidadeCustodiadora');
            const unidadeIdInput = document.getElementById('unidadeId');
            const saveButton = document.getElementById('saveButton');
            const form = document.getElementById('unidadeCustodiaForm');
            const searchResultsDiv = document.getElementById('searchResults');

            // Função para resetar e desabilitar campos
            function resetFormAndDisable() {
                unidadeCustodiadoraInput.value = '';
                unidadeIdInput.value = '';
                unidadeCustodiadoraInput.disabled = true;
                saveButton.disabled = true;
                searchResultsDiv.innerHTML = '';
            }

            // Lógica de busca no primeiro campo [2.3.i]
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    const searchTerm = searchInput.value.trim();
                    if (searchTerm.length === 0) {
                        searchResultsDiv.innerHTML = '<div class="alert alert-info">Digite algo para buscar ou deixe vazio para inserir um novo registro.</div>';
                        unidadeCustodiadoraInput.disabled = false; // Desbloqueia para novo registro [2.3.i.1]
                        saveButton.disabled = false;
                        unidadeIdInput.value = ''; // Limpa ID para garantir que seja novo registro
                        unidadeCustodiadoraInput.focus();
                        return;
                    }

                    fetch('/unidade-custodia/search', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Laravel CSRF
                        },
                        body: JSON.stringify({ search: searchTerm })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success && data.data) {
                            // Registro encontrado
                            searchResultsDiv.innerHTML = `<div class="alert alert-success">Registro encontrado: ID ${data.data.id} - ${data.data.unidadeCustodiadora}</div>`;
                            unidadeCustodiadoraInput.value = data.data.unidadeCustodiadora;
                            unidadeIdInput.value = data.data.id;
                            unidadeCustodiadoraInput.disabled = false; // Desbloqueia para edição
                            saveButton.disabled = false;
                        } else {
                            // Nenhum registro encontrado, desbloqueia para novo registro [2.3.i.1]
                            searchResultsDiv.innerHTML = `<div class="alert alert-warning">${data.message || 'Nenhum registro encontrado. Campos desbloqueados para novo registro.'}</div>`;
                            unidadeCustodiadoraInput.value = '';
                            unidadeIdInput.value = '';
                            unidadeCustodiadoraInput.disabled = false;
                            saveButton.disabled = false;
                            unidadeCustodiadoraInput.focus();
                        }
                    })
                    .catch(error => {
                        console.error('Erro na busca:', error);
                        searchResultsDiv.innerHTML = `<div class="alert alert-danger">Erro ao buscar: ${error.message}</div>`;
                        unidadeCustodiadoraInput.disabled = true; // Mantém desabilitado em caso de erro grave
                        saveButton.disabled = true;
                    });
                }, 500); // Debounce de 500ms
            });

            // Lógica de submissão do formulário (Gravar) [2.3.iv]
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                saveButton.disabled = true; // Desabilita para evitar múltiplos cliques

                const formData = {
                    id: unidadeIdInput.value,
                    unidadeCustodiadora: unidadeCustodiadoraInput.value,
                    autorRegistro: document.getElementById('autorRegistro').value,
                    dataHoraRegistro: document.getElementById('dataHoraRegistro').value
                };

                fetch('/unidade-custodia/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        searchResultsDiv.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                        // Opcional: Recarregar a lista ou limpar o formulário
                        resetFormAndDisable();
                        searchInput.value = ''; // Limpa o campo de busca
                        // Se for uma atualização, o ID poderia ser mantido, mas para novo registro, deve ser limpo
                    } else {
                        searchResultsDiv.innerHTML = `<div class="alert alert-danger">${data.message || 'Erro ao salvar.'}</div>`;
                    }
                    saveButton.disabled = false;
                })
                .catch(error => {
                    console.error('Erro ao salvar:', error);
                    searchResultsDiv.innerHTML = `<div class="alert alert-danger">Erro ao salvar: ${error.message}</div>`;
                    saveButton.disabled = false;
                });
            });

            // Inicialmente desabilita os campos e botões até uma busca ou clique para novo registro
            resetFormAndDisable();
        }
        // ... Repetir e adaptar para cada tipo de formulário (municipio-custodia, tipo-processo, etc.)
    }

    // Adicionar token CSRF para requisições AJAX do Laravel
    const metaCsrfToken = document.createElement('meta');
    metaCsrfToken.setAttribute('name', 'csrf-token');
    metaCsrfToken.setAttribute('content', '{{ csrf_token() }}'); // O Blade renderizará o token
    document.head.appendChild(metaCsrfToken);
});