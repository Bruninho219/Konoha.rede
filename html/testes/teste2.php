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
		<nav id="nav1"></nav>
		<section>
			
			<?php
				if (!function_exists('curl_init'))
				{
					print "cURL não está instalado!";
				}
				else
				{
					$url = "https://github.com/Bruninho219/Konoha.rede/blob/master/html/componentes/versao";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$output = curl_exec($ch);
					curl_close($ch);
					//print $output;

					$var1 = explode('<td id="LC1" class="blob-code blob-code-inner js-file-line">', $output);
					$var2 = explode('</td>',$var1[1]);
					
					print "<p>".$var2[0]."</p>";
				}
			?>
			
		</section>
		<footer>
			<?php include("../componentes/footerbar.php"); ?>
		</footer>
	</body>
</html>