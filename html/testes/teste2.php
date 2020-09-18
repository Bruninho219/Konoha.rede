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
			<!--***************-->
			<?php
				function curl_download()
				{
					if (!function_exists('curl_init'))
					{
						die('cURL não está instalado!');
					}

					$Url = "https://github.com/Bruninho219/Konoha.rede/blob/master/html/componentes/versao";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $Url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$output = curl_exec($ch);
					curl_close($ch);

					$start = strpos($output, '<td id="LC1" class="blob-code blob-code-inner js-file-line">');
					$end = strpos($output, '</td>', $start);
					$length = $end-$start;
					return $output = substr($output, $start, $length)
				}
				print curl_download('http://www.gutenberg.org/browse/scores/top');
			?>
			<!--***************-->
		</section>
		<footer>
			<?php include("../componentes/footerbar.php"); ?>
		</footer>
	</body>
</html>