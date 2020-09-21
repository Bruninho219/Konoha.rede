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
		<nav id="nav1">
			<?php
				$c=`cat /Konoha/samba/imp_list`;
				echo "<pre>$c</pre>";
			?>
		</nav>
		<section>
			<h1>
				<b>Remover impressora compartilhada:</b>
			</h1>
			<form name="formCamp" method="POST">
				<p>
					<b>Informe o nome da impressora:</b>
					<br>
					<input type="text" name="comp_nick" id="comp_nick" placeholder="Ex.: Direcao">
				</p>
				<p>
					<br>
					<br>
					<input type="button" onclick="DelImpFunction();" value="Remover">
				</p>
			</form>
		</section>

		<br>
		<br>
		<br>
		
		<?php
			if (isset($_POST['comp_nick']))
			{
				$c = "rm -R /Konoha/samba/smb.d/IMP_{$_POST['comp_nick']}.conf";
				$c = shell_exec($c);
				echo "<pre>$c</pre>";
				
				$c = "rm -R /Konoha/samba/includes.conf";
				$c = shell_exec($c);
				echo "<pre>$c</pre>";
				
				$c = "ls /Konoha/samba/smb.d/* | sed -e 's/^/include = /' > /Konoha/samba/includes.conf";
				$c = shell_exec($c);
				echo "<pre>$c</pre>";

				$c = "sed -i '/{$_POST['comp_nick']}/d' /Konoha/samba/imp_list";
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
		function DelImpFunction()
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