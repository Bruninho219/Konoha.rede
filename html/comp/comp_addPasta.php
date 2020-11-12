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
			Compartilhamento:
			<?php
				$usrlist = `ls /Konoha/samba --ignore imp_all --ignore imp_list --ignore includes.conf --ignore smb.d`;
				echo "<pre>$usrlist</pre>";
			?>
		</nav>
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
					/Konoha/samba/
					<input type="text" name="comp_dir" id="comp_dir" placeholder="Ex.: PastaLocal/">
					NomePasta/
				</p>
				<p>
					<b>Permissão de acesso (grupo)</b>
					<br>
					Deixar em branco para público:
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
					<b>Tornar diretório oculto:</b>
					<br>
					Sim:
					<input type="radio" name="comp_sec" id="comp_sec" value="no"/>
					&nbsp;&nbsp;&nbsp;
					Não:
					<input type="radio" name="comp_sec" id="comp_sec" value="yes" checked/>
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
					$c = shell_exec($c);
					echo "<pre>$c</pre>";
				}

				if(!is_dir("/Konoha/samba"))
				{
					$c=`sudo mkdir /Konoha/samba`;
					$c = shell_exec($c);
					echo "<pre>$c</pre>";
				}

				if(!is_dir("/Konoha/samba/smb.d"))
				{
					$c=`sudo mkdir /Konoha/samba/smb.d`;
					$c = shell_exec($c);
					echo "<pre>$c</pre>";
				}

				$c=`sudo chmod 751 /Konoha/*`;
				$c = shell_exec($c);
				echo "<pre>$c</pre>";

				/*
				$c=`sudo chmod 751 /Konoha/samba/`;
				$c = shell_exec($c);
				echo "<pre>$c</pre>";

				$c=`sudo chmod 751 /Konoha/samba/smb.d/`;
				$c = shell_exec($c);
				echo "<pre>$c</pre>";
				*/

				
				/*
				* Aqui é sobre a pasta a ser criada
				* [INICIO]
				* Geração do arquivo /Konoha/samba/smb.d/***.conf
				*/

				if(!is_dir("/Konoha/samba/{$_POST['comp_nick']}"))
				{
					$c = "mkdir /Konoha/samba/{$_POST['comp_nick']}";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "chmod 0770 -R /Konoha/samba/{$_POST['comp_nick']}";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";
				}
				else
				{
					echo "Essa pastá já está sendo compartilhada! #1";
				}

				if(!file_exists("/Konoha/samba/smb.d/{$_POST['comp_nick']}.conf"))
				{
					$c = "touch /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "echo \"[{$_POST['comp_nick']}]\" > /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "echo \"path = /Konoha/samba/{$_POST['comp_dir']}{$_POST['comp_nick']}\"";
					$c = $c." >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "echo \"comment = {$_POST['comp_desc']}\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "echo \"read only = {$_POST['comp_leit']}\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "echo \"browseable = {$_POST['comp_sec']}\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					if ($_POST['comp_perm'] != '')
					{
						$c = "echo \"guest ok=no\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
						$c = shell_exec($c);
						echo "<pre>$c</pre>";

						$c = "echo \"valid users = {$_POST['comp_perm']}\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
						$c = shell_exec($c);
						echo "<pre>$c</pre>";
					}
					else
					{
						$c = "echo \"guest ok = yes\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
						$c = shell_exec($c);
						echo "<pre>$c</pre>";

						$c = "echo \"public = yes\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
						$c = shell_exec($c);
						echo "<pre>$c</pre>";
					}

					//faltam as permissões

					//Edição no includes
					//Metodo antigo, sem importância
					//Tá aqui para eu lembrar do código

					/*
					$c = "echo \"include = /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf\" >> /Konoha/samba/smb.d/{$_POST['comp_nick']}.conf";
					//echo $c;
					$c = shell_exec($c);
					echo "<pre>$c</pre>";
					*/

					$c = "ls /Konoha/samba/smb.d/* | sed -e 's/^/include = /' > /Konoha/samba/includes.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";
				}
				else
				{
					echo "compartilhamento já realizado! #2";
				}

				/*
				* Geração do arquivo //Konoha/samba/smb.d/***.conf
				* [FIM]
				*/
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
				/*
				if (document.getElementById('comp_dir').value == '')
				{
					alert("Informe o diretório da pasta!");
				}
				*/
				document.formCamp.submit();
			}
		}
	</script>
</html>