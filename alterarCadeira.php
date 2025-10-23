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

    echo "EDIÇÃO DE PRODUTO <br><br>";

    echo "<script>
    function validarFormulario() {
    var nome = document.forms[0]['nome'].value.trim();
    var preco = document.forms[0]['preco'].value.trim();
    var quantidade = document.forms[0]['quantidade'].value.trim();
    var dataFabricacao = document.forms[0]['dataFabricacao'].value.trim();
    var tempoVida = document.forms[0]['tempoVida'].value.trim();
    var nomeEmpresa = document.forms[0]['nomeEmpresa'].value.trim();
    var CNPJ = document.forms[0]['CNPJ'].value.trim();
    

    if (nome === '' || preco === '' || quantidade === ''|| dataFabricacao === ''|| tempoVida === ''|| nomeEmpresa === ''|| CNPJ === '') {
        alert('Todos os campos devem ser preenchidos.');
        return false;
    }
    if (isNaN(quantidade) || isNaN(tempoVida)) {
        alert('Quantidade e Tempo de Vida devem ser números.');
        return false;
    }
    return confirm('Deseja alterar as informações ' + nome + '?');
    }
    </script>";


    echo "<form method='post' action='editarBancoProduto.php' onsubmit='return validarFormulario()'>
                    <input type='hidden' value='".$lote."' name='lote'>
                    <label>Nome</label></td><td><input type='text' name='nome' value='".$nome."'><br>
					<label>Preço</label></td><td><input type='text' name='preco' value='".$preco."'><br>
                    <label>Quantidade</label></td><td><input type='number' name='quantidade' value='".$quantidade."'><br>
					<label>Classe</label></td><td><select name='classe' value='".$classe."'>
                    <option value='Residencial'>Uso Residencial</option>
                    <option value='Irrestrito'>Uso Irrestrito</option>
                    </select><br>
                    <label>Data de Fabricação (MM-YYYY)</label></td><td><input type='text' name='dataFabricacao' value='".$dataFabricacao."'><br>
                    <input type='hidden' name='carcaMax' value='30'>
                    <label>Tempo de Vida (Em anos)</label></td><td><input type='number' name='tempoVida' value='".$tempoVida."'><br>
                    <label>Nome da Empresa</label></td><td><input type='text' name='nomeEmpresa' value='".$nomeEmpresa."'><br>
                    <label>CNPJ</label></td><td><input type='text' name='CNPJ' value='".$CNPJ."'><br>
					<input type='hidden' name='usuariosID' value='".$usuariosID."'>
    <input type='submit' value='SALVAR'>
    </form><br>";

    
    $conexao->close();
    echo "<a href='site.php' class='botao'>Voltar</a>";
    exit();
}

?>