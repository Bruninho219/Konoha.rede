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
				<b>Remover usuário:</b>
			</h1>
			<form name="formUser" method="POST">
				<p>
					<b>Informe o nome de usuário:</b>
					<br>
					<input type="text" name="usr_nick" id="usr_nick" placeholder="Ex.: bruno_brs">
				</p>
				<p>
					<b>Função:</b>
					<br>
					Desabilitar:
					<input type="radio" name="alt_func" id="alt_func" value="disable"/>
					&nbsp;&nbsp;&nbsp;
					Remover:
					<input type="radio" name="alt_func" id="alt_func" value="delete" checked/>
				</p>
				<p>
					<b>Remover todos os arquivos:</b>
					<br>
					Sim:
					<input type="radio" name="alt_pass" id="alt_pass" value="" checked>
					&nbsp;&nbsp;&nbsp;
					Não:
					<input type="radio" name="alt_pass" id="alt_pass" value="">
				</p>
				<br>
				<br>
				<p>
					<input type="button" onclick="DelUserFunction();" value="Confirmar">
				</p>
			</form>
		</section>
		<br>
		<br>
		<br>
		<?php
			if (isset($_POST['usr_nick']))
			{
				$f = "sudo samba-tool user {$_POST['alt_func']} {$_POST['usr_nick']}";
				echo $f;
				$comando = shell_exec($f);
				echo "<pre>$comando</pre>";
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
		function DelUserFunction()
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