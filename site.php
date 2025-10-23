<link rel="stylesheet" href="style.css">
<html>
    <head>
        <title>Sistema de Gerenciamento</title>
    
		<style>
			.sair{
				float: right;
				text-decoration: none;	
				color: white;
			}
			
			#menu{
				background-color: #5ec4ffff;
				margen: 0px;
				padding: 10px;
			}
			#submit_telaCliente{
				
				border: none;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				cursor: pointer;
			}
			.corBranca{
				color: white;
				font-weight: bold;
				margin-right: 20px;
			}
			.cadastro{
				margin-bottom: 20px;
				margin-top: 20px;
				border: none;
				background-color: #46acffff;
				color: white;
				padding: 10px 20px;
				text-align: center;
			}
			.b_exluir{
				border: none;
				background-color: #ff4c4cff;
				color: white;
				padding: 10px 20px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				cursor: pointer;
				margin-right: 10px;
			}
			.b_visualizar{
				border: none;
				background-color: #46acffff;
				color: white;
				padding: 10px 20px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				cursor: pointer;
			}
		</style>
	</head>
	
    <body>
		<?php
			// iniciar uma sessão
			session_start();

			if (empty($_SESSION['usuariosID'])){
				// Logado??? Não?? Tchau, bb.
				header('Location: sair.php');
				exit();
			} else {
				echo '<div id="menu">
							<span class="corBranca">Bem vindo, '.$_SESSION['nome'].'</span>
							
							<a href="sair.php" class="sair">Sair</a>
							
							</div>
					';
				echo '<br><form method="post" action="cadastro.php" id="cadastro" name="cadastro">
						<input type="hidden" value ="'.$_SESSION['usuariosID'].'" name="usuariosID" id="usuariosID" size="20">
						<input type="submit" class="cadastro" value="CADASTRAR CADEIRA">
					</form>';
				
				echo '<h2>CLIENTES</h2><br>
				<form method="post" action="buscaDados.php" id="buscaDados" name="buscaDados">
					<select name="filtro" id="filtro">
						<option value="1">Nome</option>
						<option value="2">Lote</option>
						<option value="3">Quantidade</option>
					<label for="nome">Buscar Cadeira pelo Nome/Lote/Quantidade:</label>
					<input type="text" name="valor" id="nome" size="20" required>
					<input type="submit" id="submit_telaCliente" value="BUSCAR">
					</form><br><br>

				<table border="1" width="100%">
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
						<th>AÇÕES</th>
					</tr>
					';
			}

			$hostname = "127.0.0.1";
			$user = "root";
			$password = "root";
			$database = "inventariocadeiras";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			$sql="SELECT * FROM `inventariocadeiras`.`inventario`;";
                 
			$resultado = $conexao->query($sql);
			
			echo '<hr>';
				
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

				echo '<td><center><br><form method="post" action="excluirCadeira.php" id="excluirCadeira" name="excluirCadeira" onsubmit="return confirm(\'Deseja excluir '.$row['nome'].'?\')">
						<input type="hidden" name="lote" value="'.$row[0].'">
						<input type="submit" class="b_exluir" value="EXCLUIR"/>
					</form>';
				echo '<form method="post" action="alterarCadeira.php" id="alterarCadeira" name="alterarCadeira" >
						<input type="hidden" name="lote" value="'.$row[0].'">
						<input type="hidden" name="nome" value="'.$row['nome'].'">
						<input type="hidden" name="preco" value="'.$row['preco'].'">
						<input type="hidden" name="classe" value="'.$row[6].'">
						<input type="hidden" name="dataFabricacao" value="'.$row[1].'">
						<input type="hidden" name="quantidade" value="'.$row[10].'">
						<input type="hidden" name="tempoVida" value="'.$row[3].'">
						<input type="hidden" name="nomeEmpresa" value="'.$row[8].'">
						<input type="hidden" name="CNPJ" value="'.$row[7].'">
						<input type="submit" class="b_visualizar" value="ALTERAR"/>
					</form>';
				echo '<form method="post" action="movimentacaoProduto.php" id="movimentacaoProduto" name="movimentacaoProduto" >
						<input type="hidden" name="lote" value="'.$row[0].'">
						<input type="hidden" name="nome" value="'.$row['nome'].'">
						<input type="submit" class="b_visualizar" value="MOVIMENTAR"/>
					</form>';
				echo '</center></td></tr>';
			}
			echo '</table>';
			$conexao -> close();
           
		?>
		<br>
		
	</body>
</html>