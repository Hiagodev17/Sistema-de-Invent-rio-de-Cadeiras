<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buscaDados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   

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
    $valor = $conexao->real_escape_string($_POST['valor']);
    $filtro = $conexao->real_escape_string($_POST['filtro']);

    if($filtro == 1){
        $sql="SELECT * FROM `inventariocadeiras`.`inventario` where `nome` like '%".$valor."%';";
    } else if($filtro == 2){
        $sql="SELECT * FROM `inventariocadeiras`.`inventario` where `lote` = '".$valor."';";
    } else if($filtro == 3){
        $sql="SELECT * FROM `inventariocadeiras`.`inventario` where `quantidade` = '".$valor."';";
    }
    $resultado = $conexao->query($sql);
           
    echo "<h2>RESULTADOS DA BUSCA</h2>";
    echo '<table border="1" width="100%">
					<tr>
						<th>LOTE</th>
						<th>NOME</th>
						<th>PREÇO</th>
						<th>CLASSE</th>
						<th>DATA-FABRICAÇÃO</th>
						<th>QUANTIDADE</th>
						<th>TEMPO VIDA</th>
						<th>NOME EMPRESA</th>
						<th>CNPJ</th>
						
					</tr>
					';
    while($row = mysqli_fetch_array($resultado)){
        echo '<tr>';
        echo '<td><center>'.$row['lote'].'</center></td>';
		echo '<td><center>'.$row['nome'].'</center></td>';
		echo '<td><center>'.$row['preco'].'</center></td>';
		echo '<td><center>'.$row[6].'</center></td>';
		echo '<td><center>'.$row[1].'</center></td>';
		echo '<td><center>'.$row[10].'</center></td>';
		echo '<td><center>'.$row[3].'</center></td>';
		echo '<td><center>'.$row[8].'</center></td>';
		echo '<td><center>'.$row[7].'</center></td>';
        echo '</tr>';
    }
    echo '</table>';
        echo "<br>";
        echo "<a href='site.php' class='botao'>Voltar</a>";

}

?>
</body>
</html>