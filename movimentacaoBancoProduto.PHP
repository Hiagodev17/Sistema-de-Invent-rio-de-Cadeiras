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
    $lote = $conexao->real_escape_string($_POST['lote']);
    $usuariosID = $conexao->real_escape_string($_POST['usuariosID']);
    $tipoMovimentacao = $conexao->real_escape_string($_POST['tipoMovimentacao']);
    $quantidade = $conexao->real_escape_string($_POST['quantidade']);
    

        if($tipoMovimentacao == 1){
            $sql2 = "UPDATE `inventario` SET `quantidade` = `quantidade` + '".$quantidade."' WHERE `lote` = '".$lote."';";
        } else {
            $sql2 = "UPDATE `inventario` SET `quantidade` = `quantidade` - '".$quantidade."' WHERE `lote` = '".$lote."';";
        }
        $resultado2 = $conexao->query($sql2);
    }
    $conexao->close();
    header('Location: site.php', true, 301);
    exit();


?>