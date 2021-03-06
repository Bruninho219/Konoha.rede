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
			<h2>Remoção de grupo:</h2>
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
										<label class="col-lg-3 col-form-label form-control-label">Grupo*</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" name="grp_nick" value="">
										</div>
									</div>
									<!--
									<hr>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Reescreva o nome do grupo que deseja remover*</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" name="grp_nick2" value="">
										</div>
									</div>
									-->
								</div>				
								
								<div class="form-group row">
									<div class="col-lg-12 text-right">
										<input type="reset" class="btn btn-secondary" value="Cancelar">
										<input type="submit" name="submit" class="btn btn-primary" value="Remover"
											onclick="DelGrpFunction();">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php
			if (isset($_POST['grp_nick']))
			{
				$f = "sudo samba-tool group delete {$_POST['grp_nick']}";
				
				$comando = shell_exec($f);
				echo "<pre>$comando</pre>";
				echo "<pre>$f</pre>";
			}
		?>
	</body>
	<br>
	<br>
	<br>
	<script type="text/javascript">
		function AddGrpFunction()
		{
			//if (document.getElementByName('grp_nick').value == '' ||
			//	document.getElementByName('grp_nick').value != document.getElementByName('grp_nick2').value)
			if (document.getElementByName('grp_nick').value == '')
			{
				alert("Verifique o nome do grupo!");
			}
			else
			{ 
				document.formGrp.submit();
			}
		}
	</script>
</html>