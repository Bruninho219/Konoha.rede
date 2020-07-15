<html>
	<head>
		<title>Konoha</title>
		<link rel="stylesheet" type="text/css" href="../css/php.css">
		<link rel="shortcut icon" href="../img/icon.png">
	</head>
	
	<body style= "margin: 0 auto;">
		<header>
			<?php include("./navbar.php"); ?>
		</header>
		<nav id="nav1" style= "background-color: #C0C0C0;">
			Versão atual:
			<br>
			v. 0.3.0
		</nav>
		<section>
			<?php
				$f = `cat ./Notas_Atualizacao.txt`;
				echo "<pre>$f</pre>";
			?>
		</section>
		<footer>
			<?php include("./footerbar.php"); ?>
		</footer>
	</body>
</html>

