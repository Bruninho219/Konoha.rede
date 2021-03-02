<html>
	<head>
		<title>Konoha</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<link rel="shortcut icon" href="../img/icon.png" href="./../index.php">
		<style>
			*
			{
				font-size: 13px;
			}
		</style>
	</head>
	<body>
		<?php
			include "./../componentes/navbar2.php";
		?>

		<div class="container">
			<h2>Criação de pasta compartilhada</h2>
			<form class="form" role="form" autocomplete="off" method="POST">
				<div class="container py-3">
					<div class="row">
						<div class="mx-auto col-sm-12">
							<div class="card">
								<div class="card-header">
									<h6 class="mb-0">Informações obrigatórias</h4>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Pasta*</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" name="comp_nick" value="">
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<h6 class="mb-0">Informações opcionais</h4>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<label class="col-lg-2 col-form-label form-control-label">Diretório</label>
										<br>
										/Konoha/samba/
										<div class="col-lg-3">
											<input class="form-control" type="text" name="comp_dir" value="" placeholder="Ex.: PastaLocal">
										</div>
										/Pasta_a_ser_criada

										<div class="col-lg-1"></div>

										<label class="col-lg-3 col-form-label form-control-label">Permissão de acesso</label>
										<br>
										(deixar em branco para público)
										<div class="col-lg-3">
											<input class="form-control" type="text" name="comp_perm" value="">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Descrição</label>
										<div class="col-lg-3">
											<input class="form-control" type="text" name="comp_desc" value="">
										</div>
									</div>
									
									<hr/>
									
									<div class="form-group row">
										<label class="col-lg-2 col-form-label form-control-label">Apenas leitura</label>
										<div class="col-lg-1 text-center">
											Sim <input type="radio" class="" name="comp_leit" value="no">
											Não <input type="radio" class="" name="comp_leit" value="yes" checked/>
										</div>

										<div class="col-lg-1"></div>

										<label class="col-lg-2 col-form-label form-control-label">Diretório oculto</label>
										<div class="col-lg-1 text-center">
											Sim <input type="radio" class="" name="comp_sec" value="no">
											Não <input type="radio" class="" name="comp_sec" value="yes" checked/>
										</div>
									</div>
									
									<hr/>
									<div class="form-group row">
										<div class="col-lg-12 text-right">
											<input type="reset" class="btn btn-secondary" value="Cancelar">
											<input type="submit" name="submit" class="btn btn-primary" value="Criar"
												onclick="AddPastaFunction();">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
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
				echo "<br>compartilhamento já realizado! #2";
			}

			
			/*
			* Geração do arquivo //Konoha/samba/smb.d/***.conf
			* [FIM]
			*/

			echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
		}
	?>
	<br>
	<br>
	<br>
	<script type="text/javascript">
		function AddPastaFunction()
		{
			if (document.getElementByName('comp_nick').value == '')
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