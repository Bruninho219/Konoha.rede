<div class="menubar">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="../index.php">
					<p>
						<!--HOME-->
						Konoha
						<img src="../img/konoha.png" width="25" height="25"/>
					</p>
				</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						Usuário
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<!--USUARIO-->
						<li><a href="../usr/usr_add2.php">Adicionar</a></li>
						<li><a href="../usr/usr_edt.php">Editar</a></li>
						<li><a href="../usr/usr_src2.php">Pesquisar</a></li>
						<li><a href="../usr/usr_rec.php">Recuperar senha</a></li>
						<li><a href="../usr/usr_rem.php">Remover</a></li>
						<li><a href="../usr/usr_sec.php">Segurança</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						Grupo
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<!--GRUPO-->
						<li><a href="../grp/grp_addm.php">Adicionar membro</a></li>
						<li><a href="../grp/grp_remm.php">Remover membro</a></li>
						<li><a href="../grp/grp_add.php">Criar</a></li>
						<li><a href="../grp/grp_src2.php">Pesquisar</a></li>
						<li><a href="../grp/grp_rem.php">Remover</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						Compartilhamento
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<!--COMPARTILHAMENTO-->
						<li><a href="../comp/comp_addImp.php">Adicionar impressora</a></li>
						<li><a href="../comp/comp_allImp.php">Comp.geral de impressora</a></li>
						<li><a href="../comp/comp_edtImp.php">Editar impressora</a></li>
						<li><a href="../comp/comp_delImp.php">Remover impressora</a></li>
						<li><a href="../comp/comp_addPasta.php">Adicionar pasta</a></li>
						<li><a href="../comp/comp_edtPasta.php">Editar pasta</a></li>
						<li><a href="../comp/comp_delPasta.php">Remover pasta</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						Segurança
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<!--SEGURANCA-->
						<li><a href="../sec/sec_pass.php">Senha</a></li>
						<li><a href="../sec/sec_validacao.php">Validação de arquivos</a></li>
						<li><a href="#">.</a></li>
						<li><a href="#">.</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						Configuração
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<!--CONFIGURACAO-->
						<li><a href="../componentes/Notas_Atualizacao.php">Notas de atualizações</a></li>
						<li><a href="#">.</a></li>
						<li><a href="#">.</a></li>
						<li><a href="#">.</a></li>
						<li><a href="../componentes/php.php">PHP info</a></li>
					</ul>
				</li>
				<!--
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						TESTE
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="../testes/teste.php">Teste SH</a></li>
					</ul>
				</li>
				<li>
					<a href="#">
						Sair
						<img src="../img/logout.png" width="25" height="25" href="#"/>
					</a>
				</li>
				-->
			</ul>
		</div>
	</nav>
</div>