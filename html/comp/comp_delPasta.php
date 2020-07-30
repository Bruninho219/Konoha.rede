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
				<b>Remover pasta compartilhada:</b>
			</h1>
			<form name="formCamp" method="POST">
				<p>
					<b>Informe o nome da pasta:</b>
					<br>
					<input type="text" name="comp_nick" id="comp_nick" placeholder="Ex.: MUSICAS">
				</p>
				<!--
				<p>
					//Seria arriscado der essa permissão sem uma validação antes
					<b>Remover todos os arquivos:</b>
					<br>
					Sim:
					<input type="radio" name="comp_del" id="comp_del" value="yes" checked>
					&nbsp;&nbsp;&nbsp;
					Não:
					<input type="radio" name="comp_del" id="comp_del" value="no">
				</p>
				-->
				<p>
					<br>
					<br>
					<input type="button" onclick="DelPastaFunction();" value="Remover">
				</p>
			</form>
		</section>

		<br>
		<br>
		<br>

		<?php
			if (isset($_POST['comp_nick']))
			{
				$c = "rn -R /Konoha/samba/{$_POST['comp_nick']}";
				$c = shell_exec($c);
				echo "<pre>$c</pre>";

				$c = "rm -R /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
				$c = shell_exec($c);
				echo "<pre>$c</pre>";
				
				$c = "rm -R /Konoha/samba/includes.conf";
				$c = shell_exec($c);
				echo "<pre>$c</pre>";
				
				$c = "ls /Konoha/samba/smb.d/* | sed -e 's/^/include = /' > /Konoha/samba/includes.conf";
				$c = shell_exec($c);
				echo "<pre>$c</pre>";
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
		unction DelPastaFunction()
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