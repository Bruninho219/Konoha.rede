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
			<h2>Informações sobre conta do usuário</h2>
			<form class="form" role="form" autocomplete="off" method="POST">

				<div class="container py-3">
					<div class="row">
						<div class="mx-auto col-sm-12">
							<!-- form user info -->
							<div class="card">
									<div class="card-header">
										<h6 class="mb-0">Informações obrigatórias</h4>
									</div>
									<div class="card-body">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label">Usuário*</label>
											<div class="col-lg-9">
												<input class="form-control" type="text" name="usr_nick" value="">
											</div>
										</div>

										<hr>

										<div class="form-group row">
											<div class="col-lg-12 text-right">
												<div class="col-lg-1 text-center">
													<nobr><input type="radio" name="usr_pesq" value="0" checked class=""> Detalhado</nobr>
													<nobr><input type="radio" name="usr_pesq" value="1" class=""> Simples</nobr>
												</div>
											</div>
										</div>


									</div>
								</div>
				

								<div class="form-group row">
									<div class="col-lg-12 text-right">
										<input type="reset" class="btn btn-secondary" value="Cancelar">
										<input type="submit" name="submit" class="btn btn-primary" value="Pesquisar"
											onclick="SrcUserFunction();">
									</div>
								</div>
							</div>
							<!-- /form user info -->
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
	<?php
		if (isset($_POST['usr_nick']))
		{
			$f = "sudo samba-tool user show {$_POST['usr_nick']}";
			$comando = shell_exec($f);
			nl2br($comando);

			if ($_POST['usr_pesq'] != '0')
			{
				//Nome completo
				$var1 = explode('cn: ', $comando);
				$var2 = explode('<br/>',$var1[1]);
				print "<b>Nome completo: </b>".$var2[0]."<br>";

				//Telefone
				$var1 = explode('telephoneNumber: ', $comando);
				$var2 = explode('<br/>',$var1[1]);
				print "<b>Telefone: </b>".$var2[0]."<br>";

				//Diretório
				$var1 = explode('homeDirectory: ', $comando);
				$var2 = explode('<br/>',$var1[1]);
				print "<b>Diretório: </b>".$var2[0]."<br>";

				//EMail
				$var1 = explode('mail: ', $comando);
				$var2 = explode('<br/>',$var1[1]);
				print "<b>E-mail: </b>".$var2[0]."<br>";

				//Departamento
				$var1 = explode('department:', $comando);
				$var2 = explode('<br/>',$var1[1]);
				print "<b>Departamento: </b>".$var2[0]."<br>";

				//Cargo
				$var1 = explode('title: ', $comando);
				$var2 = explode('<br>',$var1[1]);
				print "<b>Cargo: </b>".$var2[0]."<br>";

				//Companhia
				$var1 = explode('company: ', $comando);
				$var2 = explode('<br/>',$var1[1]);
				print "<b>Companhia: </b>".$var2[0]."<br>";

				/*
				//Descrição
				$var1 = explode('description: ', $comando);
				//Tem que achar um modo para achar o fim da descrição.
				$var2 = explode('/0:',$var1[1]);
				print "<b>Descrição: </b>".$var2[0]."<br>";
				*/
			}
			else
			{
				echo "<pre>$comando</pre>";
			}
		}
	?>
	<br>
	<br>
	<br>
	<script type="text/javascript">
		function SrcUserFunction()
		{
			if (document.getElementById('usr_nick').value == '')
			{
				alert("Informe o nome de usuário!");
			}
			else
			{ 
				document.formUser.submit();
			}
		}
	</script>
</html>