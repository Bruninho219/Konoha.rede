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
				<b>Editar usuário:</b>
			</h1>
			<form name="formUser" method="POST">
				<p>
					<b>Informe o nome de usuário:</b>
					<br>
					<input type="text" name="usr_nick" id="usr_nick" placeholder="Ex.: bruno_brs">
				</p>
				<br>
				<br>
				<p>
					<input type="button" onclick="EdtUserFunction();" value="Editar">
				</p>
			</form>
		</section>
		<br>
		<br>
		<br>
		<?php
			if (isset($_POST['usr_nick']))
			{
				$f = "sudo samba-tool user edit {$_POST['usr_nick']}";
				$comando = shell_exec($f);
				//echo "Verificar um método secundário de editar usuário!";
				//echo "<pre>$comando</pre>";
				echo "<textarea id=\"usr_edt\" rows=\"20\" cols=\"75\">";
				echo $comando;
				echo "</textarea>";
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
		function EdtUserFunction()
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