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
    // Evita caracteres especiais (SQL Inject)
    $lote = $conexao->real_escape_string($_POST['lote']);
    $sql = "SELECT quantidade, carcaMax FROM inventario WHERE lote = '".$lote."';";
    $result = $conexao->query($sql);
    $row = $result->fetch_assoc();
    $estoqueAtual = $row['quantidade'];
    $carcaMax = $row['carcaMax'];

    

    echo "MOVIMENTAÇÕES DE PRODUTOS <br><br>";

    


    echo "<form method='post' action='movimentacaoBancoProduto.php' onsubmit='return validarMovimentacao()'>
    <input type='hidden' name='lote' value='".$lote."'>
    <input type='hidden' name='estoqueAtual' value='".$estoqueAtual."'>
    <input type='hidden' name='usuariosID' size='20' value='".$_SESSION['usuariosID']."'><br>

    <label>Quantidade</label><br>
    <input type='number' name='quantidade' size='20'><br><br>

    <label>Tipo de Movimentação: </label>
    <select name='tipoMovimentacao' >
        <option value='1'>Entrada</option>
        <option value='0'>Saída</option>
    </select><br><br>

    <input type='submit' value='ENVIAR'>
    </form><br>";

    echo "
    <script>
    function validarMovimentacao() {
        var tipo = document.querySelector('[name=tipoMovimentacao]').value;
        var quantidade = parseInt(document.querySelector('[name=quantidade]').value) || 0;
        var estoqueAtual = " . (int)$estoqueAtual . ";
        var carcaMax = " . (int)$carcaMax . ";

        if (tipo == '0') { // Saída
            if (quantidade > estoqueAtual) {
                alert('Atenção: A quantidade de saída não pode ser maior que o estoque atual!');
                return false;
            }
            if ((estoqueAtual - quantidade) < 10){
                var confirmar = confirm('Atenção: O estoque ficará abaixo de 10 unidades!');
                if (!confirmar) {
                    return false;
                }
            }
        } else if (tipo == '1') { // Entrada
            if ((quantidade + estoqueAtual) > carcaMax) {
                alert('Atenção: A quantidade de entrada não pode ser maior que a carga máxima!');
                return false;
            }
        }
        return true;
    }
    </script>
    ";
    $conexao->close();
    echo "<a href='site.php' class='botao'>Voltar</a>";
    exit();
}

?>