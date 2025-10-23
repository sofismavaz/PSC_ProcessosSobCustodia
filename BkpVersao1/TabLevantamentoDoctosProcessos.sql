-- Tabela para armazenar informações de documentos e processos
CREATE TABLE documentos_processos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,

    idUnidadeCustodiadora INT, -- Código da tabela de unidades - Preferencialmente obtido da base Institucional
    idMunicipioCustodiadora INT, -- Código da tabela de unidades - Preferencialmente obtido da base IBGE
    numeroDocumentoProcesso VARCHAR(255),
    idTipoProcesso INT, -- Código da tabela de classificação processos (Administrativo/Judicial/Gestão Pessoas)
    tituloDescricaoDocumentoProcesso TEXT,
    dataInicioTramitacao DATE, -- Primeira data do processo
    dataFimTramitacao DATE, -- ultima data do processo
    quantidadeDocumentos INT, -- Quantidade de folhas
    volume VARCHAR(50), -- Qual o volume a ser registrado (1, 2, 3,...)
    volumeFinal VARCHAR(50), -- Total de volumes do processo
    idTipoVolume INT, -- Código da tabela de tipos de volumes (Livro/Processo/Documento)
    idCodigoClassificacaoTabelaTemporalidade INT, -- Código da tabela de classificação de temporalidade
    idTamanhoFolha INT, -- Código da tabela de tamanho de folhas
    idValorHistorico INT, -- Código da tabela de valor histórico
    idEstadoConservacao INT, -- Código da tabela de estado de conservação
    localArmazenamento VARCHAR(255), -- (Móvel / Estante / Prateleira / Caixa)
    codigoEventoEditalSEI VARCHAR(255), -- Evento de tramitação no SEI da publicação do edital
    dataEventoPublicacaoSEI DATE, -- Data SEI da publicação do edital
    observacoes TEXT -- Campo para notas adicionais
);

-- Tabela de unidades demandadas
CREATE TABLE unidadeCustodiadora (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    unidadeCustodiadora VARCHAR(255)
);

-- Tabela de Muicipio da unidades demandadas
CREATE TABLE municipioCustodiadora (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    municipioCustodiadora VARCHAR(255)
);

-- Tabela para armazenar os tipos de volumes
CREATE TABLE tipoProcesso (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipoProcesso VARCHAR(255)
);

-- Tabela para armazenar os tipos de volumes
CREATE TABLE tipoVolume (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipoVolume VARCHAR(255)
);

-- Tabela de classificação de temporalidade
CREATE TABLE classificacaoTemporalidade (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    codigo VARCHAR(50) UNIQUE NOT NULL,
    descricaoAssunto TEXT,
    tempoGuardaCorrente INT, -- Tempo em meses ou anos
    tempoGuardaIntermediaria INT,-- Tempo em meses ou anos
    destinacaoFinal VARCHAR(255), -- Ex: Eliminação, Guarda Permanente
    observacaoAvisos TEXT -- Campo para notas adicionais
);

-- Tabela tamanho de folha (A0, A2, A3, A4, A5, A6, Oficio, Jornal, folheto, Planta)
CREATE TABLE tamanhoFolha (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    tamanhoFolha VARCHAR(255)
);

-- Tabela para armazenar os códigos de descrição do valor histórico
CREATE TABLE valorHistorico (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    valorHistorico VARCHAR(255)
);

-- Tabela descrição do estado de conservação do processo (Bom, Danificado, ilegível, ...)
CREATE TABLE estadoConservacao (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    estadoConservacao VARCHAR(255)
);
