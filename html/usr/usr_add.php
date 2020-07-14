<html>
	<head>
		<title>Konoha</title>
		<link rel="stylesheet" type="text/css" href="../css/usr.css">
		<link rel="shortcut icon" href="../img/icon.png">
	</head>
	
	<?php
		if (isset($_POST['usr_nick']))
		{
			var_dump($_POST['usr_nick']);
			$func = `sudo samba-tool user add `;
			$func = $func . $_POST['usr_nick'];
			$func = $func . ` `;
			$func = $func . $_POST['usr_pass1'];
			$func = $func . ` --home-directory `;
			$func = $func . $_POST['usr_dir'];
			$func = $func . ` --given-name `;
			$func = $func . $_POST['usr_nome'];
			$func = $func . ` --surname `;
			$func = $func . $_POST['usr_snome'];
			$func = $func . ` --mail-address `;
			$func = $func . $_POST['usr_email'];
			$func = $func . ` --telephone-number `;
			$func = $func . $_POST['usr_tel'];
			//$func = $func . " --force-badname";
			echo "<pre>$func</pre>";
		}
	?>

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
				<b>Adicionar usuário:</b>
			</h1>
			<!--<form action="../fnc/fncUsr_add.php" method="POST">-->
			<form name="formUser" method="POST">
				<p>
					<b>Informe o nome de usuário:</b>
					<br>
					<input type="text" name="usr_nick" id="usr_nick" placeholder="Ex.: bruno_brs">
				</p>
				<p>
					<b>Informe o nome do usuário:</b>
					<br>
					<input type="text" name="usr_nome" id="usr_nome" placeholder="Ex.: Bruno">
				</p>
				<p>
					<b>Informe o sobrenome do usuário:</b>
					<br>
					<input type="text" name="usr_snome" id="usr_snome" placeholder="Ex.: Silva">
				</p>
				<p>
					<b>Informe o telefone do usuário:</b>
					<br>
					<input type="tel" name="usr_tel" id="usr_tel" pattern="[0-9]{11}" placeholder="Ex.: 12345678901">
				</p>
				<p>
					<b>Email:</b>
					<br>
					<input type="email" name="usr_email" id="usr_email" placeholder="Ex.: bruno@konoha.rede">
				</p>
				<p>
					<b>Informe senha:</b>
					<br>
					<input type="password" name="usr_pass1" id="usr_pass1">
					<br>
					<b>Reinforme a senha:</br>
					<input type="password" name="usr_pass2" id="usr_pass2">
				</p>
				<p>
					<b>Solicitar alteração de senha:</b>
					<br>
					Sim
					<input type="radio" name="alt_pass" id="alt_pass" value="senha_sim" checked>
					&nbsp;&nbsp;&nbsp;
					Não:
					<input type="radio" name="alt_pass" id="alt_pass" value="senha_nao">
				</p>
				<p>
					<b>Diretório:</b>
					<br>
					&nbsp;/var/
					<input type="text" name="usr_dir" id="usr_dir" placeholder="home/bruno/">
				</p>	
				<p>
					<br>
					<br>
					<input type="button" onclick="AddUserFunction();" value="Criar">
				</p>
			</form>
		</section>
		<br>
		<br>
		<br>
		<footer>
			<?php include("../componentes/footerbar.php"); ?>
		</footer>
	</body>
	<script type="text/javascript">
	function AddUserFunction()
	{
		if (document.getElementById('usr_pass1').value == '' || document.getElementById('usr_pass2').value == '')
		{
			console.log("Campos em branco");
		}
		else
		{ 
			if (document.getElementById('usr_pass1').value == document.getElementById('usr_pass2').value)
			{
				document.formUser.submit();
			}
			else
			{
				alert("Verifique se as senhas correspondem!");
			}
		}
	}
	</script>
</html>