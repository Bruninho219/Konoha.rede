<html>
	<head>
		<title>Konoha</title>
		<link rel="stylesheet" type="text/css" href="./css/index.css">
		<link rel="shortcut icon" href="./img/icon.png">
	</head>
	
	<body style= "margin: 0 auto;">
		<header>
			<?php include("./componentes/navbar.php"); ?>
		</header>
		<nav id="nav1">
			<br>
			<?php
				$output = `cal`;
				echo "<pre>$output</pre>";
			?>
		</nav>
		<section>
			<p><b>Sistema:</b></p>
			<?php
				$output = `uname -s -r`;
				echo "<pre>$output</pre>";
			?>
			
			<br>
			<p><b>Usuário logado:</b></p>
			<?php
				$output = `w -s`;
				echo "<pre>$output</pre>";
			?>

			<br>
			<p><b>Apache:</b></p>
			<?php
				$output = `apache2 -v`;
				echo "<pre>$output</pre>";
			?>

			<br>
			<p><b>SAMBA:</b></p>
			<?php
				$output = `samba-tool -V`;
				echo "<pre>$output</pre>";
			?>

			<br>
			<p><b>GitHub:</b></p>
			<?php
				$output = `git --version`;
				echo "<pre>$output</pre>";
			?>

			<!--- 50 -->
			<br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br>
			<!--- 50 -->
		</section>
		<footer>
			<?php include("./componentes/footerbar.php"); ?>
		</footer>
	</body>
</html>

