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
				<b>Criar grupo:</b>
			</h1>
			<form name="formGrp" method="POST">
				<p>
					<b>Informe o nome de grupo:</b>
					<br>
					<input type="text" name="grp_nick" id="grp_nick" placeholder="Ex.: escritorio">
				</p>
				<p>
					<b>Email:</b>
					<br>
					<input type="email" name="grp_email" id="grp_email" placeholder="Ex.: escritorio@x.com">
				</p>
				<p>
					<b>Descrição:</b> (não use "/0" na descrição)
					<br>
					<input type="text" name="grp_desc" id="grp_desc" placeholder="Ex.: Grupo do escritorio">
				</p>
				<p>
					<br>
					<br>
					<input type="button" onclick="AddGrpFunction();" value="Criar">
				</p>
			</form>
		</section>
		<br>
		<br>
		<br>
		
		<?php
			if (isset($_POST['grp_nick']))
			{
				$f = "sudo samba-tool group add {$_POST['grp_nick']}";
				
				if ($_POST['grp_email'] != '')
				{
					$f=$f." --mail-address {$_POST['grp_email']}";
				}
				if ($_POST['grp_desc'] != '')
				{
					$f=$f." --description {$_POST['grp_desc']}"."/0";
				}
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
		function AddGrpFunction()
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