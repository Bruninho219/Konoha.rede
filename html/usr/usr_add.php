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
				<p>
					<b>Nome do usuário:</b>
					<br>
					<input type="text" name="usr_nome" id="usr_nome" placeholder="Ex.: Bruno">
				</p>
				<p>
					<b>Sobrenome do usuário:</b>
					<br>
					<input type="text" name="usr_snome" id="usr_snome" placeholder="Ex.: Silva">
				</p>
				<p>
					<b>Telefone:</b>
					<br>
					<input type="tel" name="usr_tel" id="usr_tel" pattern="[0-9]{11}" placeholder="Ex.: 12345678901">
				</p>
				<p>
					<b>Email:</b>
					<br>
					<input type="email" name="usr_email" id="usr_email" placeholder="Ex.: bruno@konoha.rede">
				</p>
				<p>
					<b>Cargo:</b>
					<br>
					<input type="text" name="usr_cargo" id="usr_cargo" placeholder="Diretor">
				</p>
				<p>
					<b>Departamento:</b>
					<br>
					<input type="text" name="usr_depart" id="usr_depart" placeholder="RH">
				</p>
				<p>
					<b>Compania:</b>
					<br>
					<input type="text" name="usr_company" id="usr_company" placeholder="Empresa A1">
				</p>
				<p>
					<b>Descrição:</b>
					<br>
					<input type="text" name="usr_desc" id="usr_desc" placeholder="Descrição do usuário">
				</p>
				<p>
					<b>Solicitar alteração de senha:</b>
					<br>
					Sim
					<input type="radio" name="alt_pass" id="alt_pass" value="senha_sim" checked>
					&nbsp;&nbsp;&nbsp;
					Não:
					<input type="radio" name="alt_pass" id="alt_pass" value="senha_nao">
				</p>
				<p>
					<b>Diretório:</b>
					<br>
					&nbsp;/var/
					<input type="text" name="usr_dir" id="usr_dir" placeholder="home/bruno/">
				</p>	
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
				$f = "sudo samba-tool user create {$_POST['usr_nick']} ";
				$f = "{$_POST['usr_pass1']}";
				
				//" --home-directory {$_POST['usr_dir']} --given-name {$_POST['usr_nome']} --surname {$_POST['usr_snome']} --mail-address {$_POST['usr_email']} --telephone-number {$_POST['usr_tel']}";

				/*
				$f = "sudo samba-tool user create {$_POST['usr_nick']} {$_POST['usr_pass1']}";

				if (document.getElementById('usr_dir').value <> '')
				{
					$f=$f." --home-directory /var/";
					$f=$f."{$_POST['usr_dir']}";
				}
				if (document.getElementById('usr_nome').value <> '')
				{
					$f=$f." --given-name {$_POST['usr_nome']}";
				}
				if (document.getElementById('usr_snome').value <> '')
				{
					$f=$f. " --surname {$_POST['usr_snome']}";
				}
				if (document.getElementById('usr_email').value <> '')
				{
					$f=$f. " --mail-address {$_POST['usr_email']}";
				}
				if (document.getElementById('usr_tel').value <> '')
				{
					$f=$f. " --telephone-number {$_POST['usr_tel']}";
				}
				if (document.getElementById('usr_cargo').value <> '')
				{
					$f=$f. " --job-title {$_POST['usr_cargo']}";
				}
				if (document.getElementById('usr_depart').value <> '')
				{
					$f=$f. " --departament {$_POST['usr_depart']}";
				}
				if (document.getElementById('usr_company').value <> '')
				{
					$f=$f. " --company {$_POST['usr_company']}";
				}
				
				if (document.getElementById('usr_desc').value <> '')
				{
					$f=$f. " --description {$_POST['usr_desc']}";
				}
				*/
				
				$comando = shell_exec($f);
				echo "<pre>$comando</pre>";
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