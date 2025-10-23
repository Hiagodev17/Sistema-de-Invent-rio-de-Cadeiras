<link rel="stylesheet" href="style.css">
<?php
session_start();
$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "inventariocadeiras";

$conexao = new mysqli($hostname, $user, $password, $database);

if($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else{
    
    $lote = $conexao->real_escape_string($_POST['lote']);
    $nome = $conexao->real_escape_string($_POST['nome']);
    $preco = $conexao->real_escape_string($_POST['preco']);
    $classe = $conexao->real_escape_string($_POST['classe']);
    $dataFabricacao = $conexao->real_escape_string($_POST['dataFabricacao']);
    $tempoVida = $conexao->real_escape_string($_POST['tempoVida']);
    $nomeEmpresa = $conexao->real_escape_string($_POST['nomeEmpresa']);
    $CNPJ = $conexao->real_escape_string($_POST['CNPJ']);
    $usuariosID = $_SESSION['usuariosID'];
    $quantidade = $conexao->real_escape_string($_POST['quantidade']);

    $sql = "UPDATE `inventariocadeiras`.`inventario` 
            SET `nome` = '$nome', 
                `preco` = '$preco', 
                `classe` = '$classe' ,
                `dataFabricacao` = '$dataFabricacao', 
                `tempoVida` = '$tempoVida', 
                `nomeEmpresa` = '$nomeEmpresa',
                `CNPJ` = '$CNPJ',
                `quantidade` = '$quantidade'
            WHERE `lote` = $lote;";
          
    $resultado = $conexao->query($sql);
    $conexao->close();
    header('Location: site.php', true, 301);
    exit();
}

?>