<html>
	<head>
		<title>Konoha</title>
		<link rel="stylesheet" type="text/css" href="../css/usr.css">
		<link rel="shortcut icon" href="../img/icon.png">
	</head>
	
	<body>
		<header>
			<?php include("../componentes/navbar.php"); ?>
		</header>
		<nav id="nav1">
			Usuários:
			<?php
				$usrlist = `sudo samba-tool user list`;
				echo "<pre>$usrlist</pre>";
			?>
		</nav>
		<section>
			<h1>
				<b>Adicionar usuário:</b>
			</h1>
			<form name="formUser" method="POST">
				<b>Campos obrigatórios:</b>
				<br>
				<p>
					<b>Informe o nome de usuário:</b>
					<br>
					<input type="text" name="usr_nick" id="usr_nick" placeholder="Ex.: bruno_brs">
				</p>
				<p>
					<b>Informe senha:</b>
					<br>
					<input type="password" name="usr_pass1" id="usr_pass1">
					<br>
					<b>Reinforme a senha:</br>
					<input type="password" name="usr_pass2" id="usr_pass2">
				</p>
				<br>
				<br>
				<b>Campos opcionais:</b>
				<br>
				<div class="container">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td>
									<p>
										<b>Nome do usuário:</b>
										<br>
										<input type="text" name="usr_nome" id="usr_nome" placeholder="Ex.: Bruno">
									</p>
								</td>
								<td>
									<p>
										<b>Sobrenome do usuário:</b>
										<br>
										<input type="text" name="usr_snome" id="usr_snome" placeholder="Ex.: Silva">
									</p>
								</td>
								<td>
									<p>
										<b>Telefone:</b>
										<br>
										<input type="tel" name="usr_tel" id="usr_tel" pattern="[0-9]{11}" placeholder="Ex.: 12345678901">
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p>
										<b>Email:</b>
										<br>
										<input type="email" name="usr_email" id="usr_email" placeholder="Ex.: nomeUsuario@x.com">
									</p>
								</td>
								<td>
									<p>
										<b>Grupo:</b>
										<br>
										<input type="text" name="usr_grupo" id="usr_gru" placeholder="Escritório">
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p>
										<b>Departamento:</b>
										<br>
										<input type="text" name="usr_depart" id="usr_depart" placeholder="RH">
									</p>
								</td>
								<td>
									<p>
										<b>Compania:</b>
										<br>
										<input type="text" name="usr_company" id="usr_company" placeholder="Empresa A1">
									</p>
								</td>
								<td>
									<p>
										<b>Cargo:</b>
										<br>
										<input type="text" name="usr_cargo" id="usr_cargo" placeholder="Diretor">
									</p>
								</td>>
							</tr>
							<tr>
								<td>
									<p>
										<b>Descrição:</b>
										<br>
										<input type="text" name="usr_desc" id="usr_desc" placeholder="Descrição do usuário">
									</p>
								</td>
								<td>
									<p>
										<b>Diretório:</b>
										<br>
										&nbsp;/var/
										<input type="text" name="usr_dir" id="usr_dir" placeholder="home/bruno/">
									</p>
								</td>
								<td>
									<p>
										<b>Solicitar alteração de senha:</b>
										<br>
										Sim
										<input type="radio" name="alt_pass" id="alt_pass" value="senha_sim" checked>
										&nbsp;&nbsp;&nbsp;
										Não:
										<input type="radio" name="alt_pass" id="alt_pass" value="senha_nao">
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<p>
					<br>
					<br>
					<input type="button" onclick="AddUserFunction();" value="Criar">
				</p>
			</form>
		</section>

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