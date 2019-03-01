<?php
	try{
		$bdd = new PDO('mysql:****;dbname=****;charset=utf8','****','****',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e) {die("Erreur: " . $e->getMessage());}

	ini_set('display_errors', 0);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edhellenlam - Translation tool</title>
		<meta name="description" content="Translator between english and sindarin">
		<?php
			include('shared_head.php');
		?>
		<link rel="stylesheet" href="css/translator.css">
	</head>
	<body>

		<?php
			include('header.php');
		?>

			<div class="body">
				<div class="translator">
					<form class="english_form" method="post">
						<label for="english">English : </label>
						<input type="text" name="english" id="english">
						<input type="submit" name="submit_english" value="Translate !">
					</form>

					<form class="sindarin_form" method="post">
						<label for="sindarin"> Sindarin  : </label>
						<input type="text" name="sindarin" id="sindarin">
						<input type="submit" name="submit_sindarin" value="Translate !">
					</form>
				</div>

				<div class="translator_answer">

				<?php
					$english = $_POST['english'];
					if (isset($_POST['submit_english']) AND !empty($english)){
						$request = $bdd->query('SELECT * FROM english_to_sindarin');

						$exists = false;
						while ($line = $request->fetch()){
							$searchArray = stripos($line['english'], ',') != false ? explode(',', $line['english']) : array($line['english']);
							foreach ($searchArray as $word){
								if (stripos($word, $english) !== false){
									$words[] = array('english' => $word, 'sindarin' => $line['sindarin'], 'nature' => $line['nature']);
								}
							}

							unset($word);
						}

						if (!empty($words)){
				?>

								<table>
									<tr>
										<th>
											Sindarin (Nature)
										</th>

										<th class="padding_left">
											English
										</th>
									</tr>
								<?php
									foreach ($words as $line){
										/*echo ("<tr>");
											echo ("<td> " . $line['sindarin'] . " </td>");
											echo ("<td> " .  $line['english'] . " </td>");
											echo ("<td> " . $line['nature'] . " </td>");
										echo("</tr>");*/

										?>
									<tr>
										<td> <?php echo($line['sindarin'] . " (" . $line['nature'] . ")"); ?> </td>
										<td class="padding_left"> <?php echo($line['english']) ?> </td>
									</tr>
										<?php

									}
								?>
								</table>

								<?php
							}
						}

						$sindarin = $_POST['sindarin'];
						if (isset($_POST['submit_sindarin']) AND !empty($sindarin)){
							$request = $bdd->query('SELECT * FROM english_to_sindarin');

							$words = array();
							while ($line = $request->fetch()){
								foreach (explode(',', $line['sindarin']) as $word){
									if (stripos($word, $sindarin) !== false){
										$words[] = array('sindarin' => $word, 'english' => $line['english'], 'nature' => $line['nature']);
									}
								}

								unset($word);
							}

							if (!empty($words)){

								?>

								<table>
									<tr>
										<th>
											Sindarin (Nature)
										</th>

										<th class="padding_left">
											English
										</th>
									</tr>
								<?php
									foreach ($words as $line){
										/*echo ("<tr>");
											echo ("<td> " . $line['sindarin'] . " </td>");
											echo ("<td> " . $line['english'] . " </td>");
											echo ("<td> " . $line['nature'] . " </td>");
										echo("</tr>");*/

											?>
										<tr>
											<td> <?php echo($line['sindarin'] . " (" . $line['nature'] . ")"); ?> </td>
											<td class="padding_left"> <?php echo($line['english']) ?> </td>
										</tr>
											<?php
										
									}
								?>
								</table>

								<?php

							}
						}
					?>
				</div>

			</div>
	</body>
</html>
