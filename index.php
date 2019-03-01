<?php
	session_start();
	session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edhellenlam - Home</title>
		<meta name="description" content="Edhellenlam.fr is an online Sindrin-English dictionary or translaton tool">
		<meta name="google-site-verification" content="Y2MkqGwCSp84Fr916HW98uSuIlIoMJtG_9DJL9eDZQo" />
		<?php
			include('shared_head.php');
		?>
		<link rel="stylesheet" href="css/index.css">
	</head>

	<body>

		<a href="index_fr.php" class="flag"><img height="13" width="19" src="img/france_flag.png" alt="french_flag"></a>

		<?php
			include('header.php');
		?>

		<article>

			<h1> Presentation </h1>

			<p>
				edhellenlam.fr is an online Sindarin-English dictionary or translation tool created between october 2018 and january 2019 by us, J.M. and S.L., two senior high school students from France. <br>
				In order to have our baccalaureate, we are taking sort of an examination called “TPE”, which means supervised personal works in english. This examination is about creating a project which links two subjects, which are in this case english and engineering sciences. We must realize a written production which answers to a problematic we found ourselves, then another production using a free technique and present it during an oral presentation.
				This website is our free-technique production : a translation tool between english and Sindarin. You can translate about 500 words with it ! It contains also some basic informations about Sindarin like pronouns or pronunciation. <br>
				You will also find the sources  of all the informations so you will be able to consult them and find even more informations if needed-and of course it is a way to credit them.<br>
				<br>
				If you are interested in our full work (written production, logbook), you can read it <a href="compte_rendu.pdf">here</a>.<br>
				<br>
				We really hope you will enjoy this website ! 

			</p>

		</article>

	</body>
</html>