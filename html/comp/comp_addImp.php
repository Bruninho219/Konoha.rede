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
					<input type="text" name="comp_nick" id="comp_nick" placeholder="">
				</p>
				<p>
					<b>Usuários/Grupos permitidos:</b>
					<br>
					<input type="text" name="comp_perm" id="comp_perm" placeholder="">
				</p>
				<p>
					<b>Path:</b>
					<br>
					<input type="text" name="comp_path" id="comp_path" placeholder="Padrão: /tmp">
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
				if(!is_dir("/Konoha/"))
				{
					$c=`sudo mkdir /Konoha`;
					//echo $c;
					echo "<pre>$c</pre>";
				}

				if(!is_dir("/Konoha/samba"))
				{
					$c=`sudo mkdir /Konoha/samba`;
					//echo $c;
					echo "<pre>$c</pre>";
				}

				if(!is_dir("/Konoha/samba/imp_list"))
				{
					$c=`sudo touch /Konoha/samba/imp_list`;
					//echo $c;
					echo "<pre>$c</pre>";
				}

				if(!is_dir("/Konoha/samba/smb.d"))
				{
					$c=`sudo mkdir /Konoha/samba/smb.d`;
					//echo $c;
					echo "<pre>$c</pre>";
				}

				$c=`sudo chmod 751 /Konoha/samba/`;
				//echo $c;
				echo "<pre>$c</pre>";
				$c=`sudo chmod 751 /Konoha/samba/smb.d/`;
				//echo $c;
				echo "<pre>$c</pre>";
				

				/*
				* Aqui é sobre a impressora a ser criada
				*/

				if(!file_exists("/Konoha/samba/smb.d/IMP_{$_POST['comp_nick']}.conf"))
				{
					$c = "echo {$_POST['comp_nick']} > /Konoha/samba/imp_list";
					//echo $c;
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "touch /Konoha/samba/smb.d/IMP_{$_POST['comp_nick']}.conf";
					//echo $c;
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "echo \"[{$_POST['comp_nick']}]\" > /Konoha/samba/smb.d/IMP_{$_POST['comp_nick']}.conf";
					//echo $c;
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					if ($_POST['comp_path'] != '')
					{
						$c = "echo \"path = {$_POST['comp_path']}\" >> /Konoha/samba/smb.d/IMP_{$_POST['comp_nick']}.conf";
						//echo $c;
						$c = shell_exec($c);
						echo "<pre>$c</pre>";
					}
					else
					{
						$c = "echo \"path = /tmp\" >> /Konoha/samba/smb.d/IMP_{$_POST['comp_nick']}.conf";
						//echo $c;
						$c = shell_exec($c);
						echo "<pre>$c</pre>";
					}

					$c = "echo \"printer name = {$_POST['comp_nick']}]\" >> /Konoha/samba/smb.d/IMP_{$_POST['comp_nick']}.conf";
					//echo $c;
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "echo \"printable = yes\" >> /Konoha/samba/smb.d/IMP_{$_POST['comp_nick']}.conf";
					//echo $c;
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					if ($_POST['comp_path'] != '')
					{
						$c = "echo \"valid users = {$_POST['comp_perm']}]\" >> /Konoha/samba/smb.d/IMP_{$_POST['comp_nick']}.conf";
						//echo $c;
						$c = shell_exec($c);
						echo "<pre>$c</pre>";
					}
					else
					{
						$c = "echo \"valid users = public\" >> /Konoha/samba/smb.d/IMP_{$_POST['comp_nick']}.conf";
						//echo $c;
						$c = shell_exec($c);
						echo "<pre>$c</pre>";
					}

					$c = "echo \"create mode = 0700\" >> /Konoha/samba/smb.d/IMP_{$_POST['comp_nick']}.conf";
					//echo $c;
					$c = shell_exec($c);
					echo "<pre>$c</pre>";

					$c = "ls /Konoha/samba/smb.d/* | sed -e 's/^/include = /' > /Konoha/samba/includes.conf";
					//echo $c;
					$c = shell_exec($c);
					echo "<pre>$c</pre>";
				}
				else
				{
					echo "compartilhamento da impressora já realizado!";
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