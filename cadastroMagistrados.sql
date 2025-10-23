 -- Descrição dos atributos do Cadastro de Pessoas:
CREATE TABLE CadMagistrados (
    matricula INT PRIMARY KEY, -- matricula: Número de matrícula (chave primária).
    matriculaAnterior INT, -- matriculaAnterior: Número de matrícula anterior (se houver).
    cpf CHAR(11) UNIQUE, -- cpf: CPF do magistrado (único).
    nome VARCHAR(255) NOT NULL, -- nome: Nome completo do magistrado.
    dtNascimento DATE, -- dtNascimento: Data de nascimento.
    idSexo CHAR(1), -- idSexo: Identificador de sexo (por exemplo, 'M' para masculino, 'F' para feminino).
    idGenero CHAR(1),
    idRacaCor CHAR(1),
    idDeficiencia CHAR(1),

    email VARCHAR(100),
    identidadeRG VARCHAR(20), -- registroGeralRG: Número do RG.
    orgaoExpedidorRG VARCHAR(50), -- orgaoExpedidorRG: Órgão expedidor do RG.
    ufEmissorRG CHAR(2), -- uf: Unidade Federativa (sigla de 2 caracteres).
    dtEmissaoRG DATE,
    pisPasep VARCHAR(20), -- pisPasep: Número do PIS/PASEP.
    certificadoMilitar VARCHAR(20),
    tituloEleitor VARCHAR(20),
    ufTitulo CHAR(2),
    municipioEleitoral VARCHAR(100),
    zonaEleitoral VARCHAR(5),
    secaoEleitoral VARCHAR(5),
    dtExpedicaoTitulo DATE,
    dtUltimaVotacao DATE,

    nomePai VARCHAR(255),
    nomeMae VARCHAR(255),
    estadoCivil VARCHAR(50),
    nomeConjuge VARCHAR(255),
    localTrabalhoConjuge VARCHAR(100),
    qtdeDependentes INT,
    nomeDependentes VARCHAR(255), -- chamar tb aux.

    logradouro VARCHAR(255), -- logradouro: Endereço (logradouro).
    bairro VARCHAR(100), -- bairro: Bairro.
    cidade VARCHAR(100), -- cidade: Cidade.
    ufLogradouro CHAR(2),
    cep CHAR(8), -- cep: Código endereçamento postal (CEP).
    foneTrabalho VARCHAR(15), -- foneTrabalho: Telefone de trabalho.
    foneCelular VARCHAR(15), -- fonePessoal: Telefone pessoal.

    cargo VARCHAR(100),
    regimeCotas VARCHAR(50),
    dtIngresso DATE,
    dtDesligamento DATE, -- dtDesligamento: Data de desligamento.
    orgaoJulgadorLotacao VARCHAR(100),
    situacaoProfissionalAtual VARCHAR(50), -- idSituacao: Situação atual do magistrado - Tab aux.
    dtInicioSituacao DATE,
    dtFimSituacao DATE,

    cargoAtual VARCHAR(100),
    regimeCotas BOOLEAN,
    dtIngressoCargoAtual DATE, -- dtIngresso: Data de ingresso.
    orgaoJulgadorCargoAtual VARCHAR(100),
    situacaoProfissionalCargoAtual VARCHAR(50),
    dtinicioSituacaoCargoAtual DATE,
    drFimSituacaoCargoAtual DATE,

    nivelGraduacao VARCHAR(50),
    areaEspecializacao VARCHAR(100),
    participacaoConselho BOOLEAN,
    instituicaoConselho VARCHAR(100),

    atividadeDocente BOOLEAN,
    instituicaoEnsino VARCHAR(100),
    horarioDisciplina VARCHAR(100),

    banco VARCHAR(100),
    agencia VARCHAR(10),
    contaCorrente VARCHAR(20),
    tipoConta VARCHAR(50),

    idTipoServidor VARCHAR(50), -- idTipoServidor: Tipo de servidor - Tab aux.
    onusTribunal VARCHAR(50), -- onusTribunal: Ônus do tribunal (Sim ou Não).
    jornadaTrabalho VARCHAR(50), -- jornadaTrabalho: Jornada de trabalho.
    qtdeSalarioFamilia INT, -- qtdeSalarioFamilia: Quantidade de salário-família.
    salarioOrigem DECIMAL(10, 2), -- salarioOrigem: Salário de origem.
    vencimentoOrigem DECIMAL(10, 2), -- vencimentoOrigem: Vencimento de origem.
    valorPrevidencia DECIMAL(10, 2), -- valorPrevidencia: Valor da previdência.
    patronalOrigem DECIMAL(10, 2), -- patronalOrigem: Patronal de origem.
    ressarcimentoOrigem DECIMAL(10, 2), -- ressarcimentoOrigem: Ressarcimento de origem.
    lotacao VARCHAR(100), -- idLotacao: Lotação do magistrado Tab Aux.
    aprovadoTCU BOOLEAN, -- aprovadoTCU: Indica se foi aprovado pelo TCU (booleano).
    possuiDoenca BOOLEAN, -- possuiDoenca: Indica se possui doença (booleano).
    dtAposentadoria DATE, -- dtAposentadoria: Data de aposentadoria.
    subtotalPercAposentadoria DECIMAL(5, 2), -- subtotalPercAposentadoria: Subtotal percentual de aposentadoria.
    totalPercAposentadoria DECIMAL(5, 2), -- totalPercAposentadoria: Total percentual de aposentadoria.
    tipoPrevidencia VARCHAR(50), -- tipoPrevidencia: Tipo de previdência.
    licenciado BOOLEAN, -- licenciado: Indica se está licenciado (booleano).
    instituidorPensao BOOLEAN, -- instituidorPensao: Indica se é instituidor de pensão (booleano).
    servidorPJ BOOLEAN, -- servidorPJ: Indica se é servidor PJ (booleano).
    adicionalInsalubridade DECIMAL(10, 2), -- adicionalInsalubridade: Valor do adicional de insalubridade.
    adicionalPericulosidade DECIMAL(10, 2), -- adicionalPericulosidade: Valor do adicional de periculosidade.
    adicionalAtividadePenosa DECIMAL(10, 2), -- adicionalAtividadePenosa: Valor do adicional de atividade penosa.
    Origem VARCHAR(100), -- Origem: Origem do magistrado.
    nrBienio INT, -- nrBienio: Número do biênio.
    permanencia VARCHAR(50) -- permanencia: Informação sobre permanência.
);