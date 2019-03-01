<?php

	session_start();

	try{
		$bdd = new PDO('mysql:host=****;dbname=****;charset=utf8','****',****',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e) {die("Erreur: " . $e->getMessage());}
	
	ini_set('display_errors', 0);

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title> Edhellenlam - Administration </title>
		<?php
			include('shared_head.php');
		?>
		<link rel="stylesheet" href="css/admin.css">
	</head>

	<body>
		<?php
			include('header.php');

			$passSet = isset($_POST['pass']);
			$goodPass = $_POST['pass'] == "****";
			if (($passSet AND $goodPass) OR (isset($_SESSION['pass']) AND $_SESSION['pass'] == "****")){
				if (!isset($_SESSION['pass'])){
					$_SESSION['pass'] = $_POST['pass'];
				}
		?>
		<div>
			<h3> Data inserting </h3>
			<form method="post" action="admin.php">
				<input type="text" name="sindarin" placeholder="Sindarin" />
				<input type="text" name="english" placeholder="English" />
				<input type="text" name="nature" placeholder="Nature" />
				<input type="submit" name="submit_add_values" value="Insert !" />
			</form>
			<?php
				//Variables
				$english = $_POST['english'];
				$sindarin = $_POST['sindarin'];
				$nature = $_POST['nature'];

				if (isset($_POST['submit_add_values']) AND !empty($english) AND !empty($sindarin) AND !empty($nature)){
					
					$readRequest = $bdd->query('SELECT english, sindarin FROM english_to_sindarin');
					$exists = false;
					while ($line = $readRequest->fetch() AND !$exists){
						if ($english == $line['english'] AND $sindarin == $line['sindarin']){
							$exists = true;
						}
					}

					if (!$exists){

						$writeRequest = $bdd->prepare('INSERT INTO english_to_sindarin(english, sindarin, nature) VALUES(:english,:sindarin,:nature)');

						$writeRequest->execute(array(
							'english' => $english,
							'sindarin' => $sindarin,
							'nature' => $nature
						));

						?>

						<p> The request just executes ! ! </p>

						<?php

					}

					else{
						?>

						<p> Those entry already exist on database </p>

						<?php
					}

					$readRequest->closeCursor();
	
				}
	
				else if (isset($_POST['submit_add_values'])){
					echo ("<p> One of the fields is blank </p>");
				}


			?>
		</div>

		<div>
			<h3> Data reading </h3>
			<form method="post" action="admin.php">
				<input type="number" name="beginindex" placeholder="Start" />
				<input type="number" name="endindex" placeholder="End" />
				<input type="submit" name="submit_read_values" value="Read !" />
 			</form>

 			<?php
				//Variables
				$beginIndex = (int) $_POST['beginindex'];
				$endIndex = (int) $_POST['endindex'];

				if(isset($_POST['submit_read_values']) AND !empty($beginIndex) AND !empty($endIndex)){
					$req = $bdd->prepare("SELECT * FROM english_to_sindarin ORDER BY ID LIMIT :endindex OFFSET :beginindex");

					$beginIndex = $beginIndex - 1;
					$endIndex = $endIndex - $beginIndex;
					$req->bindParam(':beginindex', $beginIndex, PDO::PARAM_INT);
					$req->bindParam(':endindex', $endIndex, PDO::PARAM_INT);
					$req->execute();

					?>
					<table>
						<tr>
							<th>
								Index
							</th>

							<th>
								English
							</th>

							<th>
								Sindarin
							</th>

							<th>
								Nature
							</th>
						</tr>
						<?php
							while ($line = $req->fetch()){
						?>
							<tr>
								<td>
									<?php
										echo($line['ID']);
									?>
								</td>

								<td>
									<?php
										echo($line['english']);
									?>
								</td>

								<td>
									<?php
										echo($line['sindarin']);
									?>
								</td>

								<td>
									<?php
										echo($line['nature']);
									?>
								</td>
							</tr>
						<?php
							}
						?>
					</table>
					<?php

					$req->closeCursor();

				}

				else if (isset($_POST['submit_read_values'])){
					echo ("<p> One of the fields is blank </p>");
				}
			?>

		</div>

		<?php
			}

			else{

				if ($passSet AND $_POST['pass'] == "poutine"){
					?>
					<img src="https://media.tenor.com/images/e49690010a6ab20a9265f14eb7f130ef/tenor.gif" />
					<?php
				}

				else if ($passSet AND $_POST['pass'] == "batou"){
					?>
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgOJUGcAAV8DgvrApA7L7EvOWivh0jOiKfcp5mSm2iQCsKv8hi8A" />
					<?php
				}

				else if ($passSet AND $_POST['pass'] == "stone"){
					?>
						<p> You has lost the game </p>
					<?php
				}

				if ($passSet AND !$goodPass){
					echo "<p> Bad password ! </p>";
				}
		?>
		<form class="pass" method="post" action="admin.php">
			<input type="password" name="pass" placeholder="Password">
			<input type="submit" value="Submit">
		</form>
		<?php
			}
		?>

		<a class="bottomright" href="index.php">Logout</a>
	</body>
</html>
