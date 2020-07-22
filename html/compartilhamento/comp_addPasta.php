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
					<b>Descrição:</b>
					<br>
					<input type="text" name="comp_desc" id="comp_desc" placeholder="Ex.: Pasta de músicas">
				</p>
				<p>
					<b>Diretório:</b>
					<br>
					<input type="text" name="comp_dir" id="comp_dir" placeholder="Ex.: /var/musicas">
				</p>
				<p>
					<b>Permissão de acesso (grupo):</b>
					<br>
					<input type="text" name="comp_perm" id="comp_perm" placeholder="Ex.: grupo_vendas">
				</p>
				<p>
					<b>Apenas leitura:</b>
					<br>
					Sim:
					<input type="radio" name="comp_leit" id="comp_leit" value="yes" checked/>
					&nbsp;&nbsp;&nbsp;
					Não:
					<input type="radio" name="comp_leit" id="comp_leit" value="no"/>
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
				if(!is_dir("/Konoha/"))
				{
					$c=`sudo mkdir /Konoha`;
					echo "<pre>$c</pre>";
				}
				if(!is_dir("/Konoha/samba"))
				{
					$c=`sudo mkdir /Konoha/samba`;
					echo "<pre>$c</pre>";
				}
				if(!is_dir("/Konoha/samba/smb.d"))
				{
					$c=`sudo mkdir /Konoha/samba/smb.d`;
					echo "<pre>$c</pre>";
				}

				$c=`sudo chmod 751 /Konoha/samba/`;
				echo "<pre>$c</pre>";
				$c=`sudo chmod 751 /Konoha/samba/smb.d/`;
				echo "<pre>$c</pre>";
				

				/*
				* Aqui é sobre a pasta a ser criada
				*/
				if(!is_dir("/Konoha/samba/{$_POST['comp_nick']}"))
				{
					$c = "sudo mkdir mkdir /Konoha/samba/{$_POST['comp_nick']}";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "sudo chmod 0770 -R /Konoha/samba/{$_POST['comp_nick']}";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";
				}
				else
				{
					echo "Essa pastá já está sendo compartilhada! #1";
				}
				if(!file_exists("/Konoha/samba/{$_POST['comp_nick']}.conf"))
				{
					$c = "sudo touch /Konoha/samba/smb.d/{$_POST['comp_nick']}";
					$c = $c. ".conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "sudo echo \"[{$_POST['comp_nick']}]\" > /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "sudo echo \"patch = {$_POST['comp_dir']}/{$_POST['comp_nick']}\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "sudo echo \"comment = {$_POST['comp_desc']}\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "sudo echo \"ready only = {$_POST['comp_leit']}\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					//Edição no include
					$c = "sudo echo \"include = /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					//$c = "sudo ls /Konoha/samba/smb.d/* | sed -e 's/^/include = /' > /Konoha/samba/includes.conf";
					//$c = shell_exec($c);
					//echo "<pre>$c</pre>";
				}
				else
				{
					echo "compartilhamento já realizado! #2";
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