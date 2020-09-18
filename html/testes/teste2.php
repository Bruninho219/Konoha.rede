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
					print "cURL está instalado!";
					$url = "https://github.com/Bruninho219/Konoha.rede/blob/master/html/componentes/versao";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$output = curl_exec($ch);
					curl_close($ch);
					print $output;
					/*
					$start = strpos($output, "<td id=\"LC1\" class=\"blob-code blob-code-inner js-file-line\">");
					$end = strpos($output, "</td>", $start);
					$length = $end-$start;
					$output = substr($output, $start, $length)
					echo $output;*/
				}
			?>
			
		</section>
		<footer>
			<?php include("../componentes/footerbar.php"); ?>
		</footer>
	</body>
</html>