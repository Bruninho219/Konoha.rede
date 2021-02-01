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
			include "./componentes/navbar2.php";
		?>
		<div class="container">
			<form class="form" role="form">
				<div class="container py-3">
					<div class="row">
						<div class="mx-auto col-sm-12">
							<div class="card">
								<div class="card-header">
									<h6 class="mb-0">Sistema:</h4>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<?php
											$output = `uname -s -r`;
											echo "<pre>$output</pre>";
										?>
									</div>
								</div>

								<div class="card-header">
									<h6 class="mb-0">Usuário logado:</h4>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<?php
											$output = `w -s`;
											echo "<pre>$output</pre>";
										?>
									</div>
								</div>


								<div class="card-header">
									<h6 class="mb-0">Apache:</h4>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<?php
											$output = `apache2 -v`;
											echo "<pre>$output</pre>";
										?>
									</div>
								</div>

								<div class="card-header">
									<h6 class="mb-0">SAMBA:</h4>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<?php
											$output = `samba-tool -V`;
											echo "<pre>$output</pre>";
										?>
									</div>
								</div>

								<div class="card-header">
									<h6 class="mb-0">GitHub:</h4>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<?php
											$output = `git --version`;
											echo "<pre>$output</pre>";
										?>
									</div>
								</div>

								<div class="card-header">
									<h6 class="mb-0">Versão sistema:</h4>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<div>
											<?php
												if (!function_exists('curl_init'))
												{
													print "cURL não está instalado!";
												}
												else
												{
													$url = "https://github.com/Bruninho219/Konoha.rede/blob/master/html/conf/versao";
													$ch = curl_init();
													curl_setopt($ch, CURLOPT_URL, $url);
													curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
													$output = curl_exec($ch);
													curl_close($ch);

													$var1 = explode('<td id="LC1" class="blob-code blob-code-inner js-file-line">', $output);
													$var2 = explode('</td>',$var1[1]);
													
													print "<p>Versão mais recente: ".$var2[0]."</p>";
												}
											?>
										</div>
									</div>
									 <div>
									 	<div>
											<?php
												$c=`cat ./conf/versao`;
												$x.= "<pre>$c</pre>";
												echo "Versão local: ".$x;
												print "Versão local: ".$x;
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>