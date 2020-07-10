<html>
	<body>
		<?php
			var unick = $_POST['usr_nick'];
			var unome = $_POST['usr_nome'];
			var usnome = $_POST['usr_snome'];
			var utel = $_POST['usr_tel'];
			var uemail = $_POST['usr_email'];
			var upass1 = $_POST['usr_pass1'];
			var upass2 = $_POST['usr_pass2'];
			var udir = $_POST['usr_dir'];

			if (upass1 == upass2)
			{
				$func = "sudo samba-tool user add ";
				$func .= unick;
				$func .= " ";
				$func .= upass1;
				$func .= " --home-directory ";
				$func .= udir;
				$func .= " --given-name ";
				$func .= unome;
				$func .= " --surname ";
				$func .= usnome;
				$func .= " --home-directory	";
				$func .= udir;
				$func .= " --mail-address ";
				$func .= uemail;
				$func .= " --telephone-number ";
				$func .= utel;
				$func .= " --force-badname ";
				echo "<pre>$func</pre>";
			}
			else
			{
				echo "<pre>As senhas devem coincidirem!!</pre>";
			}
		?>
	</body>
</html>