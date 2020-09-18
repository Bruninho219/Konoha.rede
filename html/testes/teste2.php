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
				$site_url = "https://github.com/Bruninho219/Konoha.rede/blob/master/html/componentes/versao"
				print $site_url;
				 /*
				$var1 = explode('<td id=\"LC1" class="blob-code blob-code-inner js-file-line">', $file_contents;);
				$var2 = explode("</td>",$var1[1]);
				print "<p>Versão mais recente2:<br>";
				print $var2[0];
				print "</p>"
				*/
			}
		</section>
		<footer>
			<?php include("../componentes/footerbar.php"); ?>
		</footer>
	</body>
</html>