<?php
session_start();

class Database {
    private $host = "127.0.0.1";
    private $port = "3306"; // porta padrão do MySQL
    private $dbName = "Processos";
    private $user = "cadProcess";
    private $password = "cadProcess";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbName, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
            die();
        }
    }
}

// Função para enviar o formulário e gravar os dados no banco
function enviarFormulario() {
    $db = new Database();
    $conn = $db->conn;

    // Verifique se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Colete os valores do formulário
        $autorRegistro = $_POST["autorRegistro"];
        $dataHoraRegistro = $_POST["dataHoraRegistro"];
        $idUnidadeCustodiadora = $_POST["idUnidadeCustodiadora"];
        $idMunicipioCustodiadora = $_POST["idMunicipioCustodiadora"];
        $numeroDocumentoProcesso = $_POST["numeroDocumentoProcesso"];
        $idTipoProcesso = $_POST["idTipoProcesso"];
        $tituloDescricaoDocumentoProcesso = $_POST["tituloDescricaoDocumentoProcesso"];
        $dataInicioTramitacao = $_POST["dataInicioTramitacao"];
        $dataFimTramitacao = $_POST["dataFimTramitacao"];
        $quantidadeDocumentos = $_POST["quantidadeDocumentos"];
        $volume = $_POST["volume"];
        $volumeFinal = $_POST["volumeFinal"];
        $idTipoVolume = $_POST["idTipoVolume"];
        $idCodigoClassificacaoTabelaTemporalidade = $_POST["idCodigoClassificacaoTabelaTemporalidade"];
        $tamanhoFolha = $_POST["tamanhoFolha"];
        $idValorHistorico = $_POST["idValorHistorico"];
        $idEstadoConservacao = $_POST["idEstadoConservacao"];
        $localArmazenamento = $_POST["localArmazenamento"];
        $codigoEventoSEI = $_POST["codigoEventoSEI"];
        $editalPublicacao = $_POST["editalPublicacao"];
        $observacoes = $_POST["observacoes"];

        // Prepare a consulta SQL para inserir os dados
        $sql = "INSERT INTO documentos_processos (
            autorRegistro, dataHoraRegistro, idUnidadeCustodiadora, idMunicipioCustodiadora,
            numeroDocumentoProcesso, idTipoProcesso, tituloDescricaoDocumentoProcesso,
            dataInicioTramitacao, dataFimTramitacao, quantidadeDocumentos, volume,
            volumeFinal, idTipoVolume, idCodigoClassificacaoTabelaTemporalidade,
            tamanhoFolha, idValorHistorico, idEstadoConservacao, localArmazenamento,
            codigoEventoSEI, editalPublicacao, observacoes
        ) VALUES (
            :autorRegistro, :dataHoraRegistro, :idUnidadeCustodiadora, :idMunicipioCustodiadora,
            :numeroDocumentoProcesso, :idTipoProcesso, :tituloDescricaoDocumentoProcesso,
            :dataInicioTramitacao, :dataFimTramitacao, :quantidadeDocumentos, :volume,
            :volumeFinal, :idTipoVolume, :idCodigoClassificacaoTabelaTemporalidade,
            :tamanhoFolha, :idValorHistorico, :idEstadoConservacao, :localArmazenamento,
            :codigoEventoSEI, :editalPublicacao, :observacoes
        )";

        try {
            $stmt = $conn->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindParam(':autorRegistro', $autorRegistro);
            $stmt->bindParam(':dataHoraRegistro', $dataHoraRegistro);
            $stmt->bindParam(':idUnidadeCustodiadora', $idUnidadeCustodiadora);
            $stmt->bindParam(':idMunicipioCustodiadora', $idMunicipioCustodiadora);
            $stmt->bindParam(':numeroDocumentoProcesso', $numeroDocumentoProcesso);
            $stmt->bindParam(':idTipoProcesso', $idTipoProcesso);
            $stmt->bindParam(':tituloDescricaoDocumentoProcesso', $tituloDescricaoDocumentoProcesso);
            $stmt->bindParam(':dataInicioTramitacao', $dataInicioTramitacao);
            $stmt->bindParam(':dataFimTramitacao', $dataFimTramitacao);
            $stmt->bindParam(':quantidadeDocumentos', $quantidadeDocumentos);
            $stmt->bindParam(':volume', $volume);
            $stmt->bindParam(':volumeFinal', $volumeFinal);
            $stmt->bindParam(':idTipoVolume', $idTipoVolume);
            $stmt->bindParam(':idCodigoClassificacaoTabelaTemporalidade', $idCodigoClassificacaoTabelaTemporalidade);
            $stmt->bindParam(':tamanhoFolha', $tamanhoFolha);
            $stmt->bindParam(':idValorHistorico', $idValorHistorico);
            $stmt->bindParam(':idEstadoConservacao', $idEstadoConservacao);
            $stmt->bindParam(':localArmazenamento', $localArmazenamento);
            $stmt->bindParam(':codigoEventoSEI', $codigoEventoSEI);
            $stmt->bindParam(':editalPublicacao', $editalPublicacao);
            $stmt->bindParam(':observacoes', $observacoes);

            // Execute a consulta
            $stmt->execute();

            echo "Dados inseridos com sucesso!";
        } catch(PDOException $e) {
            echo "Erro ao inserir dados: " . $e->getMessage();
        }
    }
}

// Chame a função para enviar o formulário
enviarFormulario();
?>