<html>
	<head>
		<title>Konoha</title>
		<link rel="stylesheet" type="text/css" href="./../css/sec.css">
		<link rel="shortcut icon" href="./../img/icon.png">
	</head>
	
	<body>
		<header>
			<?php include("./../componentes/navbar.php"); ?>
		</header>
		<nav id="nav1"></nav>

		<section>
			<h1>
				<b>Validações de arquivos:</b>
			</h1>
			<p>
				<b>testparm:</b>
				<?php
					$f = `testparm`;
					echo "<pre>$f</pre>";
				?>
			</p>
			<p>
				<b>dbcheck:</b>
				<?php
					$f = `sudo samba-tool dbcheck`;
					echo "<pre>$f</pre>";
				?>
			</p>
		</section>

		<footer>
			<?php include("./../componentes/footerbar.php"); ?>
		</footer>
	</body>
</html>

