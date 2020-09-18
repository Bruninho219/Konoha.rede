<html>
	<head>
		<title>Konoha</title>
		<link rel="stylesheet" type="text/css" href="../css/teste.css">
		<link rel="shortcut icon" href="../img/icon.png">
	</head>

	<body>
		<header>
			<?php include("../componentes/navbar.php"); ?>
		</header>
		<nav id="nav1">
		</form>
		</nav>
		<section>
			<?php
				$ch = curl_init();
				$timeout = 5;
				curl_setopt ($ch, CURLOPT_URL, 'https://github.com/Bruninho219/Konoha.rede/blob/master/html/componentes/versao');
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				$file_contents = curl_exec($ch);
				curl_close($ch);

				$dado = file_get_contents($file_contents);
				
				$var1 = explode('<td id=\"LC1" class="blob-code blob-code-inner js-file-line">', $dado);
				$var2 = explode("</td>",$var1[1]);
				print "<p>Versão mais recente:<br>";
				print $var2[0];
				print "</p>"
			?>
			<?php

				$site_url = "https://github.com/Bruninho219/Konoha.rede/blob/master/html/componentes/versao"
				$ch = curl_init();
				$timeout = 0;
				curl_setopt ($ch, CURLOPT_URL, $site_url);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				ob_start();
				curl_exec($ch);
				curl_close($ch);
				$file_contents = ob_get_contents();
				ob_end_clean();
				
				$var1 = explode('<td id=\"LC1" class="blob-code blob-code-inner js-file-line">', $file_contents;);
				$var2 = explode("</td>",$var1[1]);
				print "<p>Versão mais recente2:<br>";
				print $var2[0];
				print "</p>"
			}

			<?php
				$url = "https://github.com/Bruninho219/Konoha.rede/blob/master/html/componentes/versao";
				$dado = file_get_contents($url);
				
				$var1 = explode('<td id=\"LC1" class="blob-code blob-code-inner js-file-line">', $dado);
				$var2 = explode("</td>",$var1[1]);
				print "<p>Versão mais recente3:<br>";
				print $var2[0];
				print "</p>"
			?>
		</section>
		<footer>
			<?php include("../componentes/footerbar.php"); ?>
		</footer>
	</body>
</html>