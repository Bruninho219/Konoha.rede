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
		<nav id="tobi"></nav>
		<section>
			<h1>
				<b>Recuperar senha:</b>
			</h1>
			<form>
				<p>
					<b>Informe o nome do usuário:</b>
					<br>
					<input type="text" name="usr_nome" placeholder="Ex.: bruno">
				</p>
				<p>
					<b>Informe a nova senha:</b>
					<br>
					<input type="password" name="usr_pass1">
					<br>
					<b>Reinforme a nova senha:</b>
					<br>
					<input type="password" name="usr_pass2">
				</p>
				<p>
					<b>Solicitar alteração de senha:</b>
					<br>
					Sim
					<input type="radio" name="alt_pass" value="senha_sim"
						checked>
					&nbsp;&nbsp;&nbsp;
					Não:
					<input type="radio" name="alt_pass" value="senha_nao">
				</p>
				<p>
					<br>
					<br>
					<input type="button" onclick="" value="Confirmar">
				</p>
			</form>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
		</section>
		<footer>
			<?php include("../componentes/footerbar.php"); ?>
		</footer>
	</body>
</html>