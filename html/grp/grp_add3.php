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
			<h2>Criação de grupo:</h2>
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
										<label class="col-lg-3 col-form-label form-control-label">Grupo*</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" name="grp_nick" value="">
										</div>
									</div>

									<hr>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">E-mail:</label>
										<div class="col-lg-9">
											<input class="form-control" type="email" name="grp_email" value="">
										</div>
									</div>
								</div>				

								<div class="form-group row">
									<div class="col-lg-12 text-right">
										<input type="reset" class="btn btn-secondary" value="Cancelar">
										<input type="submit" name="submit" class="btn btn-primary" value="Criar"
											onclick="AddGrpFunction();">
									</div>
								</div>
							</div>
							<!-- /form user info -->
						</div>
					</div>
				</div>
			</form>
		</div>
	</body
	<?php
		if (isset($_POST['grp_nick']))
		{
			$f = "sudo samba-tool group add {$_POST['grp_nick']}";
			
			if ($_POST['grp_email'] != '')
			{
				$f=$f." --mail-address {$_POST['grp_email']}";
			}
			/*
			if ($_POST['grp_desc'] != '')
			{
				$f=$f." --description {$_POST['grp_desc']}"."/0";
			}
			*/
			$comando = shell_exec($f);
			echo "<pre>$comando</pre>";
		}
	?>
	<br>
	<br>
	<br>
	<script type="text/javascript">
		function AddGrpFunction()
		{
			if (document.getElementByName('grp_nick').value == '')
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