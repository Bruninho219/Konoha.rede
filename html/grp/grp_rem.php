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
		<nav id="nav1">
			Grupos:
			<?php
				$grplist = `sudo samba-tool group list`;
				echo "<pre>$grplist</pre>";
			?>
		</nav>
		<section>
			<h1>
				<b>Remover Grupo:</b>
			</h1>
			<form name="formGrp" method="POST">
				<p>
					<b>Informe o nome do grupo:</b>
					<br>
					<input type="text" name="grp_nick" id="grp_nick" placeholder="Ex.: escritorio">
				</p>
				<p>
					<br>
					<br>
					<input type="button" onclick="DelGrpFunction();" value="Confirmar">
				</p>
			</form>
		</section>

		<br>
		<br>
		<br>
		<?php
			if (isset($_POST['grp_nick']))
			{
				$f = "sudo samba-tool group delete {$_POST['grp_nick']}";
				
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
		function DelGrpFunction()
		{
			if (document.getElementById('grp_nick').value == '')
			{
				alert("Informe o nome do grupo!");
			}
			else
			{ 
				document.formGrp.submit();
			}
		}
	</script>
</html>