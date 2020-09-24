<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin:16px;">
	<a class="navbar-brand" href="#">
		<img src="./../img/konoha.png" height="30" width="30" />
		<sub style="font-size: 12px;">
		Konoha</sup>
	</a>
	<button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-collapse collapse" id="navb">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link">Home</a>
			</li>
			<!-- Dropdown -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Usuário
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="./../usr/usr_add3.php">Adicionar</a>
					<a class="dropdown-item" href="./../usr/usr_edt.php">Editar</a>
					<a class="dropdown-item" href="./../usr/usr_src2.php">Pesquisar</a>
					<a class="dropdown-item" href="./../usr/usr_rec.php">Recuperar senha</a>
					<a class="dropdown-item" href="./../usr/usr_rem.php">Remover</a>
					<a class="dropdown-item" href="./../usr/usr_sec.php">Segurança</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link">Grupo</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="./../grp/grp_addm.php">Adicionar membro</a>
					<a class="dropdown-item" href="./../grp/grp_remm.php">Remover membro</a>
					<a class="dropdown-item" href="./../grp/grp_add.php">Criar</a>
					<a class="dropdown-item" href="./../grp/grp_src2.php">Pesquisar</a>
					<a class="dropdown-item" href="./../grp/grp_rem.php">Remover</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link">Compartilhamento</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="./../comp/comp_addImp.php">Adicionar impressora</a>
					<a class="dropdown-item" href="./../comp/comp_allImp.php">Comp.geral de impressora</a>
					<a class="dropdown-item" href="./../comp/comp_edtImp.php">Editar impressora</a>
					<a class="dropdown-item" href="./../comp/comp_delImp.php">Remover impressora</a>
					<a class="dropdown-item" href="./../comp/comp_addPasta.php">Adicionar pasta</a>
					<a class="dropdown-item" href="./../comp/comp_edtPasta.php">Editar pasta</a>
					<a class="dropdown-item" href="./../comp/comp_delPasta.php">Remover pasta</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link">Segurança</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="./../sec/sec_pass.php">Senha</a>
					<a class="dropdown-item" href="#">.</a>
					<a class="dropdown-item" href="#">.</a>
					<a class="dropdown-item" href="#">.</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link">Configuração</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="./componentes/Notas_Atualizacao.php">Notas de atualizações</a>
					<a class="dropdown-item" href="#">.</a>
					<a class="dropdown-item" href="#">.</a>
					<a class="dropdown-item" href="#">.</a>
					<a class="dropdown-item" href="./componentes/php.php">PHP info</a>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav">
			<a class="nav-link"><i class='fas fas fa-cog'></i>Admin</a>
			<a class="nav-link" href="#"><i class='fas fa-sign-out-alt'></i> Sair</a>
		</ul>
	</div>
</nav>