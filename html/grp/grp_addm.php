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
			Usuários:
			<?php
				$usrlist = `sudo samba-tool group list`;
				echo "<pre>$usrlist</pre>";
			?>
		</nav>
		<section>
			<h1>
				<b>Adicionar membro ao grupo:</b>
			</h1>
			<form name="formGrp" method="POST">
				<p>
					<b>Informe o nome do grupo:</b>
					<br>
					<input type="text" name="grp_nick" id="grp_nick" placeholder="Ex: escritorio"/>
				</p>
				<p>
					<b>Informe o nome do membro:</b>
					<br>
					<input type="text" name="grp_usr" id="grp_usr" placeholder="Ex: pessoa_a, pessoa_b"/>
				</p>
				<p>
					<b>Administrador:</b>
					<br>
					<input type="checkbox" name="usr_adm" id="usr_adm" value="Administrador" />
				</p>
				<p>
					<br>
					<input type="button" onclick="GerGrpFunction();" value="Adicionar">
				</p>
			</form>
		</section>
		<br>
		<br>
		<br>
		<?php
			if (isset($_POST['grp_nick']))
			{
				$f = "sudo samba-tool group addmembers {$_POST['grp_nick']} \"{$_POST['grp_usr']}\"";
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
		function GerGrpFunction()
		{
			alert(document.getElementById('usr_adm').value);
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