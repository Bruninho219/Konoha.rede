<html>
	<head>
		<title>Konoha</title>
		<link rel="stylesheet" type="text/css" href="../css/grp.css">
		<link rel="shortcut icon" href="../img/icon.png">
	</head>

	<body>
		<header>
			<?php include("../componentes/navbar.php"); ?>
		</header>
		<nav id="nav1"></nav>
		<section>
			<h1>
				<b>Criar grupo:</b>
			</h1>
			<form>
				<p>
					<b>Informe o nome de grupo:</b>
					<br>
					<input type="text" name="grp_nome" id="grp_nick" placeholder="Ex.: escritorio1">
				</p>
				<p>
					<b>Email:</b>
					<br>
					<input type="email" name="grp_email" id="grp_email" placeholder="Ex.: escritorio1@x.com">
				</p>
				<p>
					<b>Informe o nome do grupo :</b>
					<br>
					<input type="text" name="grp_nick" placeholder="Ex.: Escritorio 1">
				</p>
				<p>
					<b>Diretório:</b>
					<br>
					&nbsp;/var/
					<input type="text" name="grp_dir" placeholder="">
				</p>
				<p>
					<br>
					<br>
					<input type="button" onclick="" value="Criar">
					&nbsp;&nbsp;&nbsp;
					<input type="button" onclick="" value="Cancelar">
				</p>
			</form>
		</section>
		<footer>
			<?php include("../componentes/footerbar.php"); ?>
		</footer>
	</body>
</html>