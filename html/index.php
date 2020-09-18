<html>
	<head>
		<title>Konoha</title>
		<link rel="stylesheet" type="text/css" href="./css/index.css">
		<link rel="shortcut icon" href="./img/icon.png">
	</head>
	
	<body style= "margin: 0 auto;">
		<header>
			<?php include("./componentes/navbar.php"); ?>
		</header>
		<nav id="nav1">
			<br>
			<?php
				$output = `cal`;
				echo "<pre>$output</pre>";
			?>
			<br>
			<br>

			<?php
				$url = "https://github.com/Bruninho219/Konoha.rede/blob/master/html/componentes/versao";
				$dado = file_get_contents($url);
				$var1 = explode('<td id=\"LC1" class="blob-code blob-code-inner js-file-line">', $dado);
				$var2 = explode("</td>",$var1[1]);
				print "<p>Versão mais recente:<br>";
				print $var2[0];
				print "</p>"
			?>
			<br>
			<p>
				Versão atual:
				<?php
					$c=`cat ./componentes/versao`;
					echo "<pre>$c</pre>";
				?>
			</p>
			<?php
				$url = 'http://www.horariodebrasilia.org/index.php';
				$dadosSite = file_get_contents($url);

				$var1 = explode('<p id="relogio">',$dadosSite);
				$var2 = explode("</p>",$var1[1]);

				print "<h1><center>Horário de Brasília<br>
				".$var2[0]."</center></h1>";
			?>
		</nav>
		<section>
			<p><b>Sistema:</b></p>
			<?php
				$output = `uname -s -r`;
				echo "<pre>$output</pre>";
			?>
			
			<br>
			<p><b>Usuário logado:</b></p>
			<?php
				$output = `w -s`;
				echo "<pre>$output</pre>";
			?>

			<br>
			<p><b>Apache:</b></p>
			<?php
				$output = `apache2 -v`;
				echo "<pre>$output</pre>";
			?>

			<br>
			<p><b>SAMBA:</b></p>
			<?php
				$output = `samba-tool -V`;
				echo "<pre>$output</pre>";
			?>

			<br>
			<p><b>GitHub:</b></p>
			<?php
				$output = `git --version`;
				echo "<pre>$output</pre>";
			?>
		</section>
		<footer>
			<?php include("./componentes/footerbar.php"); ?>
		</footer>
	</body>
</html>

