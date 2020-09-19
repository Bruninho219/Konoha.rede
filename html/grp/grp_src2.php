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
				<b>Informações sobre grupos:</b>
			</h1>
			<form name="formGrp" method="POST">
				<p>
					<b>Informe o nome do grupo:</b>
					<br>
					<div id="divBusca">
						<input type="text" name="grp_nick" id="grp_nick" placeholder="Ex: escritorio"/>
						<img src="../img/search.png" height="31px" width="31px" id="btnsrc" alt="Buscar"/>
					</div>
				</p>
				<p>
					Modo de pesquisa:
					<br>
					Detalhado
					<input type="radio" name="grp_pesq" id="grp_pesq" value="0" checked>
					&nbsp;&nbsp;&nbsp;
					Simplificado
					<input type="radio" name="grp_pesq" id="grp_pesq" value="1">
				</p>
				<p>
					<br>
					<input type="button" onclick="SrcGrpFunction();" value="Pesquisar">
				</p>
			</form>
		</section>
		<br>
		<br>
		<br>
		<?php
			if (isset($_POST['grp_nick']))
			{
				$f = "sudo samba-tool group show {$_POST['grp_nick']}";
				$comando = shell_exec($f);

				if ($_POST['grp_pesq'] != '0')
				{
					//Grupo
					$var1 = explode('cn: ', $comando);
					$var2 = explode('instanceType:',$var1[1]);
					print "<b>Grupo: </b>".$var2[0]."<br>";

					//EMail
					$var1 = explode('mail: ', $comando);
					$var2 = explode('distinguishedName:',$var1[1]);
					print "<b>E-mail: </b>".$var2[0]."<br>";

					//Membros
					print "<br><b>Membros:</b>";
					$f = "sudo samba-tool group listmembers {$_POST['grp_nick']}";
					$comando = shell_exec($f);
					echo "<pre>$comando</pre>";
				}
				else
				{
					$f = $f." ; echo ; echo Membros: ; sudo samba-tool group listmembers {$_POST['grp_nick']}";
					$comando = shell_exec($f);
					echo "<pre>$comando</pre>";
				}
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
		function SrcGrpFunction()
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