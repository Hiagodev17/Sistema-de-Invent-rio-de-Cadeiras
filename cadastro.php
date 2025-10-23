<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
           
            margin: 0;
            padding: 40px;
        }
        table {
            background: #fff;
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow:black;
            width: 350px;
        }
        th {
            background: #007bff;
            color: #fff;
            font-size: 1.2em;
            padding: 12px;
            text-align: center;
        }
        td {
            padding: 10px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 95%;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
<body>
    

<?php
   session_start();
    $usuariosID = $_SESSION['usuariosID'];

    echo '<table border= 1px solid black;><tr><th>CADASTRAR CADEIRA</th></tr>
				<form method="post" action="cadastrarCadeira.php" id="cadastrarCadeira" name="cadastrarCadeira" >
					<tr><td><label>Nome</label></td><td><input type="text" name="nome"></td></tr>
					<tr><td><label>Preço</label></td><td><input type="text" name="preco"></td></tr>
                    <tr><td><label>Quantidade</label></td><td><input type="int" name="quantidade"></td></tr>
					<tr><td><label>Classe</label></td><td><select name="classe" >
                    <option value="Residencial">Uso Residencial</option>
                    <option value="Irrestrito">Uso Irrestrito</option>
                    </select></td></tr>
                    <tr><td><label>Data de Fabricação (MM-YYYY)</label></td><td><input type="text" name="dataFabricacao"></td></tr>
                    <input type="hidden" name="carcaMax" value="30">
                    <tr><td><label>Tempo Vida (Em anos)</label></td><td><input type="text" name="tempoVida"></td></tr>
                    <tr><td><label>Nome da Empresa</label></td><td><input type="text" name="nomeEmpresa"></td></tr>
                    <tr><td><label>CNPJ</label></td><td><input type="text" name="CNPJ"></td></tr>
					<input type="hidden" name="usuariosID" value="'.$usuariosID.'">
					<tr><td><input type="submit" value="CADASTRAR"></td></tr>
					</form>
				</table>';
    
    
   
    exit();


?>
</body>
</html>