<html>
	<head>
    <title>Konoha</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        *
        {
            font-size: 13px;
        }
    </style>
    	<link rel="stylesheet" type="text/css" href="../css/usr.css">
		<link rel="shortcut icon" href="../img/icon.png">
	</head>
	
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin:16px;">
	        <a class="navbar-brand" href="#">
	        	<img src="./../img/icon.png" height="30" width="30" />
	        	<sub style="font-size: 10px;">Konoha</sup>
	        </a>
	        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false">
	            <span class="navbar-toggler-icon"></span>
	        </button>

	        <div class="navbar-collapse collapse" id="navb">
	            <ul class="navbar-nav mr-auto">
	                <li class="nav-item">
	                    <a class="nav-link">Home</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link">Usuário</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link">Grupo</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link">Segurança</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link">Configuração</a>
	                </li>
	            </ul>
	            <ul class="navbar-nav">
	                <a class="nav-link"><i class='fas fas fa-cog'></i>Admin</a>
	                <a class="nav-link" href="logout.php"><i class='fas fa-sign-out-alt'></i> Sair</a>
	            </ul>
	        </div>
	    </nav>
		<nav id="nav1">
			<b>Usuários:</b>
			<?php
				$usrlist = `sudo samba-tool user list`;
				echo "<pre>$usrlist</pre>";
			?>
		</nav>
		<div class="container">
	        <h2>Criação de Usuário</h2>
	        <form class="form" role="form" autocomplete="off">

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
	                                        <input class="form-control" type="text" name="user" value="">
	                                    </div>
	                                </div>

	                                <div class="form-group row">
	                                    <label class="col-lg-3 col-form-label form-control-label">Informe a senha*:</label>
	                                    <div class="col-lg-3">
	                                        <input class="form-control" type="password" name="password" value="">
	                                    </div>
	                                    <div class="col-lg-1"></div>
	                                    <label class="col-lg-2 col-form-label form-control-label">Confirme a senha*:</label>
	                                    <div class="col-lg-3">
	                                        <input class="form-control" type="password" name="password" value="">
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
	                                    <label class="col-lg-3 col-form-label form-control-label">Nome do usuário:</label>
	                                    <div class="col-lg-3">
	                                        <input class="form-control" type="text" name="npme" value="">
	                                    </div>
	                                    <div class="col-lg-1"></div>
	                                    <label class="col-lg-2 col-form-label form-control-label">Sobrenome:</label>
	                                    <div class="col-lg-3">
	                                        <input class="form-control" type="text" name="sobrenome" value="">
	                                    </div>
	                                </div>
	                                <div class="form-group row">
	                                    <label class="col-lg-3 col-form-label form-control-label">E-mail:</label>
	                                    <div class="col-lg-3">
	                                        <input class="form-control" type="email" name="email" value="">
	                                    </div>
	                                    <div class="col-lg-1"></div>
	                                    <label class="col-lg-2 col-form-label form-control-label">Telefone:</label>
	                                    <div class="col-lg-3">
	                                        <input class="form-control" type="text" name="fone" value="">
	                                    </div>
	                                </div>


	                                <div class="form-group row">
	                                    <label class="col-lg-3 col-form-label form-control-label">Departamento:</label>
	                                    <div class="col-lg-3">
	                                        <input class="form-control" type="text" name="dept" value="">
	                                    </div>
	                                    <div class="col-lg-1"></div>
	                                    <label class="col-lg-2 col-form-label form-control-label">Grupo:</label>
	                                    <div class="col-lg-3">
	                                        <input class="form-control" type="text" name="grupo" value="">
	                                    </div>
	                                </div>


	                                <div class="form-group row">
	                                    <label class="col-lg-3 col-form-label form-control-label">Companhia:</label>
	                                    <div class="col-lg-3">
	                                        <input class="form-control" type="text" name="companhia" value="">
	                                    </div>
	                                    <div class="col-lg-1"></div>
	                                    <label class="col-lg-2 col-form-label form-control-label">Cargo:</label>
	                                    <div class="col-lg-3">
	                                        <input class="form-control" type="text" name="cargo" value="">
	                                    </div>
	                                </div>

	                                <div class="form-group row">
	                                    <label class="col-lg-3 col-form-label form-control-label">Diretório:</label>
	                                    <div class="col-lg-3">
	                                        <input class="form-control" type="text" name="dept" placeholder="/home/bruno">
	                                    </div>
	                                    <div class="col-lg-1"></div>

	                                    <label class="col-lg-3 col-form-label form-control-label">Solicitar troca de senha:</label>
	                                    <div class="col-lg-1 text-center">
	                                        Sim <input type="radio" class="">
	                                        Não <input type="radio" class="">
	                                    </div>
	                                </div>


	                                <hr />
	                                <div class="form-group row">
	                                    <div class="col-lg-12 text-right">
	                                        <input type="reset" class="btn btn-secondary" value="Cancelar">
	                                        <input type="submit" name="submit" class="btn btn-primary" value="Salvar">
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

		<br>
		<br>
		<br>

		<?php
			if (isset($_POST['usr_nick']))
			{
				$f = "sudo samba-tool user create {$_POST['usr_nick']} {$_POST['usr_pass1']}";

				if ($_POST['usr_nome'] != '')
				{
					$f=$f." --given-name \"{$_POST['usr_nome']}\"";
				}
				if ($_POST['usr_snome'] != '')
				{
					$f=$f. " --surname \"{$_POST['usr_snome']}\"";
				}
				if ($_POST['usr_email'] != '')
				{
					$f=$f. " --mail-address {$_POST['usr_email']}";
				}
				if ($_POST['usr_dir'] != '')
				{
					$f=$f." --home-directory /var/";
					$f=$f."\"{$_POST['usr_dir']}\"";
				}
				if ($_POST['usr_tel'] != '')
				{
					$f=$f. " --telephone-number \"{$_POST['usr_tel']}\"";
				}
				if ($_POST['usr_cargo'] != '')
				{
					$f=$f. " --job-title \"{$_POST['usr_cargo']}\"";
				}
				if ($_POST['usr_depart'] != '')
				{
					$f=$f. " --department \"{$_POST['usr_depart']}\"";
				}
				if ($_POST['usr_company'] != '')
				{
					$f=$f. " --company \"{$_POST['usr_company']}\"";
				}
				if ($_POST['usr_desc'] != '')
				{
					$f=$f. " --description \"{$_POST['usr_desc']}\"";
				}
				
				$comando = shell_exec($f);
				echo "<pre>$comando</pre>";


				//add no grupo
				if ($_POST['usr_gru'] != '')
				{
					$f = "sudo samba-tool group addmembers \"{$_POST['usr_gru']}\" \"{$_POST['usr_nick']}\"";
					$comando = shell_exec($f);
					echo "<pre>$comando</pre>";
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
		function AddUserFunction()
		{
			if (document.getElementById('usr_pass1').value == '' || document.getElementById('usr_pass2').value == '')
			{
				console.log("Campos em branco");
			}
			else
			{ 
				if (document.getElementById('usr_pass1').value == document.getElementById('usr_pass2').value)
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