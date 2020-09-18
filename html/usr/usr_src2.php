<html>
	<head>
		<title>Konoha</title>
		<link rel="stylesheet" type="text/css" href="../css/usr.css">
		<link rel="shortcut icon" href="../img/icon.png">
	</head>

	<body>
		<header>
			<?php include("../componentes/navbar.php"); ?>
		</header>
		<nav id="nav1">
			Usuários:
			<?php
				$usrlist = `sudo samba-tool user list`;
				echo "<pre>$usrlist</pre>";
			?>
		</nav>
		<section>
			<h1>
				<b>Informações sobre conta do usuário:</b>
			</h1>
			<form name="formUser" method="POST">
				<p>
					<b>Informe o nome de usuário:</b>
					<br>
					<div id="divBusca">
						<input type="text" name="usr_nick" id="usr_nick" placeholder="Ex: bruno_brs"/>
						<img src="../img/search.png" height="31px" width="31px" id="btnsrc" alt="Buscar"/>
					</div>
				</p>
				<p>
					Modo de pesquisa:
					<br>
					Detalhado
					<input type="radio" name="usr_pesq" id="usr_pesq" value="0" checked>
					&nbsp;&nbsp;&nbsp;
					Simplificado
					<input type="radio" name="usr_pesq" id="usr_pesq" value="1">
				</p>
				<p>
					<br>
					<input type="button" onclick="SrcUserFunction();" value="Pesquisar">
				</p>
			</form>
		</section>
		<br>
		<br>
		<br>
		<?php
			if (isset($_POST['usr_nick']))
			{
				$f = "sudo samba-tool user show {$_POST['usr_nick']} ";
				$comando = shell_exec($f);

				if ($_POST['usr_pesq'] != '0')
				{
					//Nome completo
					$var1 = explode('cn: ', $comando);
					$var2 = explode('sn:',$var1[1]);
					print "<b>Nome completo: </b>".$var2[0]."<br>";

					//Telefone
					$var1 = explode('telephoneNumber: ', $comando);
					$var2 = explode('givenName:',$var1[1]);
					print "<b>Telefone: </b>".$var2[0]."<br>";

					//Departamento
					$var1 = explode('department:', $comando);
					$var2 = explode('company:',$var1[1]);
					print "<b>Departamento: </b>".$var2[0]."<br>";

					//Cargo
					$var1 = explode('title: ', $comando);
					$var2 = explode('description:',$var1[1]);
					print "<b>Cargo: </b>".$var2[0]."<br>";

					//Companhia
					$var1 = explode('company: ', $comando);
					$var2 = explode('name:',$var1[1]);
					print "<b>Companhia: </b>".$var2[0]."<br>";

					//Descrição
					$var1 = explode('description: ', $comando);
					$var2 = explode('telephoneNumber:',$var1[1]);
					print "<b>Descrição: </b>".$var2[0]."<br>";
				}
				else
				{
					echo "<pre>$comando</pre>";
				}
			}
		?>

		<br>
		<br>
		<br>		
		<footer>
			<?php include("../componentes/footerbar.php"); ?>
		</footer>
	</body>

	<script type="text/javascript">
		function SrcUserFunction()
		{
			if (document.getElementById('usr_nick').value == '')
			{
				alert("Informe o nome de usuário!");
			}
			else
			{ 
				document.formUser.submit();
			}
		}
	</script>
</html>