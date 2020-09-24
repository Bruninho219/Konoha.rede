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
			<b>Versão atual:</b>
			<?php
				$f = `cat ./../conf/versao`;
				echo "<pre>$f</pre>";
			?>
		</nav>
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
			<?php include("./footerbar.php"); ?>
		</footer>
	</body>
</html>

