-- Tabela para armazenar informações de documentos e processos
CREATE TABLE documentos_processos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,

    idUnidadeCustodiadora VARCHAR(255), -- Chave estrangeira para a tabela de unidades
    idMunicipioCustodiadora VARCHAR(255), -- Chave estrangeira para a tabela de unidades
    numeroDocumentoProcesso VARCHAR(255),
    idTipoProcesso INT, -- Chave estrangeira para a tabela de classificação (Administrativo/Judicial)
    tituloDescricaoDocumentoProcesso TEXT,
    dataInicioTramitacao DATE,
    dataFimTramitacao DATE,
    quantidadeDocumentos INT, -- Quantidade de folhas
    volume VARCHAR(50),
    volumeFinal VARCHAR(50),
    idTipoVolume INT, -- Chave estrangeira para a tabela de tipos de volumes (Livro/Processo/Documento)
    idCodigoClassificacaoTabelaTemporalidade INT, -- Chave estrangeira para a tabela de classificação de temporalidade
    tamanhoFolha VARCHAR(50),
    idValorHistorico INT, -- Chave estrangeira para a tabela de valor histórico
    idEstadoConservacao INT, -- Chave estrangeira para a tabela de estado de conservação
    localArmazenamento VARCHAR(255), -- (Móvel / Estante / Prateleira / Caixa)
    codigoEventoSEI VARCHAR(255),
    editalPublicacao VARCHAR(255), 
    observacoes TEXT -- Campo para notas adicionais
);
-- Tabela para armazenar os tipos de volumes
CREATE TABLE tipoVolume (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipoVolume VARCHAR(255)
);
-- Tabela para armazenar os códigos de descrição do valor histórico
CREATE TABLE valorHistorico (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    valorHistorico VARCHAR(255)
);
-- Tabela descrição do estado de conservação
CREATE TABLE estadoConservacao (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    estadoConservacao VARCHAR(255)
);
-- Tabela de unidades demandadas
CREATE TABLE unidadeCustodiadora (
    autorRegistro VARCHAR(255) NOT NULL,
    dataHoraRegistro DATETIME NOT NULL,
    id INT PRIMARY KEY AUTO_INCREMENT,
    unidadeCustodiadora VARCHAR(255)
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
