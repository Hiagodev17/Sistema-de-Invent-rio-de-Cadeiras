<link rel="stylesheet" href="style.css">
<?php

$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "inventariocadeiras";

$conexao = new mysqli($hostname, $user, $password, $database);

if($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else{
    // Evita caracteres especiais (SQL Inject)
    $nome = $conexao->real_escape_string($_POST['nome']);
    $preco = $conexao->real_escape_string($_POST['preco']);
    $classe = $conexao->real_escape_string($_POST['classe']);
    $dataFabricacao = $conexao->real_escape_string($_POST['dataFabricacao']);
    $carcaMax = $conexao->real_escape_string($_POST['carcaMax']);
    $tempoVida = $conexao->real_escape_string($_POST['tempoVida']);
    $nomeEmpresa = $conexao->real_escape_string($_POST['nomeEmpresa']);
    $CNPJ = $conexao->real_escape_string($_POST['CNPJ']);
    $usuariosID = $conexao->real_escape_string($_POST['usuariosID']);
    $quantidade = $conexao->real_escape_string($_POST['quantidade']);


    $sql = "INSERT INTO inventario (`dataFabricacao`, `carcaMax`, `tempoVida`, `nome`, `preco`, `classe`, `CNPJ`,`nomeEmpresa`, `usuarios_usuariosID`, `quantidade`) 
            VALUES ('".$dataFabricacao."', '".$carcaMax."' , '".$tempoVida."', '".$nome."', '".$preco."' , '".$classe."' , '".$CNPJ."' ,'".$nomeEmpresa."' , '".$usuariosID."', '".$quantidade."' );";
    

    $resultado = $conexao->query($sql);

    $conexao->close();
    header('Location: site.php', true, 301);

}

?>