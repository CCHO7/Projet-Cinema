<?php
session_start();
if (!isset($_SESSION["IdClient"])) {
	header("location: login.php");
	exit();
}
?>


<!DOCTYPE html>
<html>

<head lang="en">

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" href="profil.css">-->
	<link rel="stylesheet" href="style/style1.css">
	<link rel="stylesheet" href="style/style-profile.css">
	<title>Profil</title>


	<style>
		body {
			font-family: 'Helvetica Neue', sans-serif;
			margin: 0;
			padding: 0;
			min-height: 100vh;
			/*background-image: linear-gradient(90deg, rgba(201,63,63,1) 0%, rgba(0,0,0,1) 50%, rgba(201,63,63,1) 100%),url(app/images/background-login.jpeg);*/
			width: 100%;
			height: 100vh;
			background-image: linear-gradient(1deg, rgba(0, 0, 0, 1) 0%, rgba(126, 159, 195, 0.3435749299719888) 100%), url('images/background-login.jpeg');
			background-size: cover;
			background-position: center;
		}
	</style>
</head>

<body>
	<?php
	include_once 'include/header.php';
	include_once 'include/functions.php';
	include_once 'include/bdd_script.php';
	echo "<br><br><br><br><br><br>";

	$array = getReservationsClient($conn, $_SESSION["IdClient"]);

	?>


	<div class="containerProfil">
		<h1 class="textprofil">Profil</h1>
		<div class="buttonProfil-container">
			<button class="buttonProfil" id="info-button">Informations personnelles</button>
			<button class="buttonProfil" id="reservation-button">Réservations</button>

		</div>
		<hr class="hrprofil">
		<div class="content-boxProfil" id="info-content">
		<h2>Informations personnelles</h2><br><br>

			<p>Nom: <b><?php echo $_SESSION["NomClient"] ?></b></p>
			<p>Prénom: <b><?php echo $_SESSION["PrenomClient"] ?></b></p>
			<p>Email: <b><?php echo $_SESSION["EmailClient"] ?></b></p>

		</div>

		<div class="content-boxProfil hide" id="reservation-content">

			<h2>Réservations</h2>
			<div>
				<!-- AFFICHAGE DES RÉSERVATIONS -->
				<?php printReservations($array, $conn); ?>
			</div>
		</div>
		<br>
		<a href="include/logout_script.php"><button class="decoProfil">DECONNEXION</button></a>
		<a href="index.php"><button class="decoProfil">ACCUEIL</button></a>
	</div>



	<script>
		const infoButton = document.getElementById('info-button');
		const reservationButton = document.getElementById('reservation-button');
		const infoContent = document.getElementById('info-content');
		const reservationContent = document.getElementById('reservation-content');

		infoButton.addEventListener('click', () => {
			infoContent.classList.remove('hide');
			reservationContent.classList.add('hide');
		});

		reservationButton.addEventListener('click', () => {
			infoContent.classList.add('hide');
			reservationContent.classList.remove('hide');
		});

		// Afficher les informations personnelles au lancement de la page
		window.addEventListener('load', () => {
			infoContent.classList.remove('hide');
		});
		const buttons = document.querySelectorAll('.buttonProfil');

		buttons.forEach(button => {
			button.addEventListener('click', () => {
				buttons.forEach(btn => {
					btn.classList.remove('active');
				});
				button.classList.add('active');
			});
		});
	</script>

</body>

</html>