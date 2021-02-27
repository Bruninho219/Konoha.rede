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
			<h2>Edição de usuário</h2>
			<form class="form" role="form" autocomplete="off" method="POST">

				<div class="container py-3">
					<div class="row">
						<div class="mx-auto col-sm-12">
							<!-- form user info -->
							<div class="card">
								<div class="card-header">
									<h6 class="mb-0">Alteração de senha:</h4>
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
											<input type="submit" name="submit" class="btn btn-primary" value="Pesquisar"
												onclick="EdtUserFunction();">
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
	<?php
		if (isset($_POST['usr_nick']))
		{
			echo "<form class=\"form\" role=\"form\" autocomplete=\"off\" method=\"POST\">";
			echo "	<div class=\"container py-3\">";
			echo "		<div class=\"row\">";
			echo "			<div class=\"mx-auto col-sm-12\">";
			echo "				<div class=\"card\">";
			echo "					<div class=\"card-header\">";
			echo "						<h6 class=\"mb-0\">Informações~sobre {$_POST['usr_nick']}:</h4>";
			echo "					</div>";
			echo "					<div class=\"form-group row\">";
			echo "						<label class=\"col-lg-3 col-form-label form-control-label\">Usuário*</label>";
			echo "						<div class=\"col-lg-9\">";
			echo "							<input class=\"form-control\" type=\"text\" name=\"usr_nick\" placeholder=\"{$_POST['usr_nick']}\">";
			echo "						</div>";
			echo "					</div>";
			echo "					<div class=\"form-group row\">";
			echo "						<label class=\"col-lg-3 col-form-label form-control-label\">Informe a senha*:</label>";
			echo "						<div class=\"col-lg-3\">";
			echo "							<input class=\"form-control\" type=\"password\" name=\"usr_pass1\" value=\"\">";
			echo "						</div>";
			echo "						<div class=\"col-lg-1\"></div>";
			echo "						<label class=\"col-lg-2 col-form-label form-control-label\">Confirme a senha*:</label>";
			echo "						<div class=\"col-lg-3\">";
			echo "							<input class=\"form-control\" type=\"password\" name=\"usr_pass2\" value=\"\">";
			echo "						</div>";
			echo "					</div>";
			echo "					<hr/>";
			echo "					<div class=\"form-group row\">";
			echo "						<div class=\"col-lg-12 text-right\">";
			echo "							<input type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"Atualizar\"";
			echo "								onclick=\"UserPassFunction();\">";
			echo "						</div>";
			echo "					</div>";
			echo "				</div>";
			echo "			</div>";
			echo "		</div>";
			echo "	</div>";
			echo "</form>";
		}
	?>
	<br>
	<br>
	<br>
	<script type="text/javascript">
		function UpdUserFunction()
		{
			if (document.getElementByName('usr_pass').value != document.getElementByName('usr_pass2').value
				|| document.getElementByName('usr_pass').value == '')
			{
				console.log("As senhas devem ser iguais e não podem ficar vazias");
			}
			else
			{ 
				document.formUser.submit();
			}
		}

		function UserPassFunction()
		{
			
		}
	</script>
</html>