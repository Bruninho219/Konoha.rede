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
		<nav></nav>
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