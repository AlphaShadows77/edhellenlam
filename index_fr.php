<?php
	session_start();
	session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Edhellenlam - Home</title>
		<meta charset="utf-8">
		<meta name="description" content="Edhellenlam.fr is an online Sindrin-English dictionary or translaton tool">
		<meta name="google-site-verification" content="Y2MkqGwCSp84Fr916HW98uSuIlIoMJtG_9DJL9eDZQo" />
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/font.css">
		<link rel="stylesheet" href="css/shared.css">
		<link rel="stylesheet" href="css/index.css">
	</head>

	<body>

		<a href="index.php" class="flag"><img height="11" width="19" src="img/england_flag.png" alt="england_flag"></a>

		<?php
			include('header.php');
		?>

		<article>

			<h1> Présentation </h1>

			<p>
				
				edhellenlam.fr est un dictionnaire ou un outil de traduction de l'anglais vers le sindarin créé d'octobre 2018 à janvier 2019 par J.M. et S.L., deux lycéens de France. <br>
				Afin d'obtenir notre baccalauréat, nous passons un examen que l'on nomme "TPE", qui veut dire Travaux Personnels Encadrés. L'examen porte sur la création d'un projet reliant 2 sujets, en l'occurence l'anglais et les Sciences de l'ingénieur. Nous devons réaliser une production écrite qui répondra à une problématique que nous avons trouvé par nous même, et une autre production libre à présenter durant un oral. Notre production libre est un site web, un outil de traduction entre l'anglais et le sindarin. Vous pouvez traduire environ 500 mots avec ! Il contient également quelques informations de base supplémentaires comme les pronoms ou bien encore la prononciation. <br>
				Vous pouvez également trouver les sources des informations présentes sur le site. Vous aurez donc la possibilité de les consulter et même de trouver plus d'informations si besoin. Bien sûr, c'est aussi un moyen de les créditer.<br>
				<br>
				Si vous êtes intéressés par notre travail complet (production écrite, journal de bord), vous pouvez le lire <a href="compte_rendu.pdf">ici</a>.<br>
				<br>
				Nous espérons que vous aimerez ce site !

			</p>

		</article>

	</body>
</html>