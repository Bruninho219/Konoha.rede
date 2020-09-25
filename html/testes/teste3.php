<html>
	<head>
		<title>Konoha</title>
		<link rel="stylesheet" type="text/css" href="../css/teste.css">
		<link rel="shortcut icon" href="../img/icon.png">
	</head>

	<body>
		<header>
			<?php include("../componentes/navbar.php"); ?>
		</header>
		<nav id="nav1">
			<form name="formUp" method="POST">
    			<input type="button" onclick="Update();" value="Atualizar">
			</form>
		</form>
		</nav>
		<section>
			[ntdsconn]
			<br>
			<?php
				$f = `samba-tool visualize ntdsconn`;
				$comando = shell_exec($f);
				echo "<pre>$comando</pre>";
			?>
			[/ls -al]

			<br>
			<br>
			<br>

			[reps]
			<br>
			<?php
				$f = `samba-tool visualize reps`;
				$comando = shell_exec($f);
				echo "<pre>$comando</pre>";
			?>

			<br>
			<br>
			<br>

			[uptodateness]
			<br>
			<?php
				$f = `samba-tool visualize uptodateness`;
				$comando = shell_exec($f);
				echo "<pre>$comando</pre>";
			?>
		</section>
		<footer>
			<?php include("../componentes/footerbar.php"); ?>
		</footer>
	</body>
	<script type="text/javascript">
		function Update()
		{
			<?php
				$f = "sudo tcc";
				$comando = shell_exec($f);
				echo "<pre>$comando</pre>";
			?>
		}
	</script>
</html>