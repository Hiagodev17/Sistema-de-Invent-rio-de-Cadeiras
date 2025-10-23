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

    $sql = "DELETE FROM `inventario` WHERE `lote` = '".$lote."';";
    $resultado = $conexao->query($sql);
    $conexao->close();
    header('Location: site.php', true, 301);
    exit();
}

?>