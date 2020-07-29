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
				<b>Compartilhamento geral de impressoras:</b>
			</h1>
			<form name="formCamp" method="POST">
				<p>
					<b>Compartilhamento geral:</b>
					<?php
						if (isset($_POST['imp_comp']))
						{
							$f = "cat /Konoha/samba/imp_all";
							$comando = shell_exec($f);
							echo "<pre>$comando</pre>";
						}
					?>
					<br>
					Ativar:
					<input type="radio" name="imp_comp" id="imp_comp" value="yes" checked>
					&nbsp;&nbsp;&nbsp;
					Desativar:
					<input type="radio" name="imp_comp" id="imp_comp" value="no">
				</p>
				<p>
					<br>
					<br>
					<input type="button" onclick="AllImpFunction();" value="Alterar">
				</p>
			</form>
		</section>

		<br>
		<br>
		<br>

		<?php
			if (isset($_POST['imp_comp']))
			{

				$f = "echo {$_POST['imp_comp']} > /Konoha/samba/imp_all";
				$comando = shell_exec($f);
				echo "<pre>$comando</pre>";
				
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
					$c=`sudo chmod 751 /Konoha/samba/smb.d/`;
					echo "<pre>$c</pre>";

				if ($_POST['imp_comp'] == "yes")
				{
					if(!is_dir("/Konoha/samba/smb.d/IMP_ALL.conf"))
					{
						$c = "touch /Konoha/samba/smb.d/IMP_ALL.conf";
						$c = shell_exec($c);
						echo "<pre>$c</pre>";

						$c = "echo \"[printers]\" > /Konoha/samba/smb.d/IMP_ALL.conf";
						$c = shell_exec($c);
						echo "<pre>$c</pre>";

						$c = "echo \"comment = Todas as impressoras\" >> /Konoha/samba/smb.d/IMP_ALL.conf"
						$c = shell_exec($c);
						echo "<pre>$c</pre>";

						$c = "echo \"print ok = yes\" >> /Konoha/samba/smb.d/IMP_ALL.conf";
						$c = shell_exec($c);
						echo "<pre>$c</pre>";

						$c = "echo \"guest ok = yes\" >> /Konoha/samba/smb.d/IMP_ALL.conf";
						$c = shell_exec($c);
						echo "<pre>$c</pre>";

						$c = "echo \"path = /var/spool/samba\" >> /Konoha/samba/smb.d/IMP_ALL.conf";
						$c = shell_exec($c);
						echo "<pre>$c</pre>";
					}

					$c = "ls /Konoha/samba/smb.d/* | sed -e 's/^/include = /' > /Konoha/samba/includes.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";
				}
				else
				{
					//comp_all=no
					$c = "sudo rm -R /Konoha/samba/smb.d/IMP_ALL.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";
					
					$c = "sed '/{$_POST['comp_nick']}/d' /Konoha/samba/includes.conf";
					$c = shell_exec($c);
					echo "<pre>$c</pre>";
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
		function AllImpFunction()
		{
			document.formCamp.submit();
		}
	</script>
</html>