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
			<h2>Recuperar senha de usuário</h2>
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
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Informe a senha*:</label>
										<div class="col-lg-3">
											<input class="form-control" type="password" name="usr_pass1" value="">
										</div>
										<div class="col-lg-1"></div>
										<label class="col-lg-2 col-form-label form-control-label">Confirme a senha*:</label>
										<div class="col-lg-3">
											<input class="form-control" type="password" name="usr_pass2" value="">
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
										<div class="col-lg-1"></div>
									
										<label class="col-lg-3 col-form-label form-control-label">Solicitar troca de senha:</label>
										<div class="col-lg-1 text-center">
											<nobr><input type="radio" name="alt_pass" value="senha_sim" checked class=""> Sim</nobr>
											<nobr><input type="radio" name="alt_pass" value="senha_nao" class=""> Não</nobr>
										</div>
									</div>
									
									<hr />
									<div class="form-group row">
										<div class="col-lg-12 text-right">
											<input type="reset" class="btn btn-secondary" value="Cancelar">
											<input type="submit" name="submit" class="btn btn-primary" value="Confirmar"
												onclick="RecUserFunction();">
										</div>
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

	<?php ?>
	
	<br>
	<br>
	<br>
	<script type="text/javascript">
		function RecUserFunction()
		{
			if (document.getElementByName('usr_pass1').value == ''
				|| document.getElementByName('usr_pass2').value == ''
				|| document.getElementByName('usr_nick').value == '')
			{
				console.log("Campos em branco");
			}
			else
			{ 
				if (document.getElementByName('usr_pass1').value == document.getElementByName('usr_pass2').value)
				{
					document.formUser.submit();
				}
				else
				{
					alert("Verifique se as senhas correspondem!");
				}
			}
		}
	</script>
</html>