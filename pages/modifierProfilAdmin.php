<?php
require_once('securite.php');
require_once('menu.php');
require_once('connexionBD.php');
require_once("fonctions.php");
$validationErrors = array();
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$requete = "select * from utilisateurs where id_user='$id' ";
$resultat = $pdo->query($requete);
$utilisateur = $resultat->fetch();
$valider = isset($_POST['valider']) ? $_POST['valider'] : "";
if ($valider) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];

	$nomPhoto = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";
	$imageTemp = $_FILES['photo']['tmp_name'];
	move_uploaded_file($imageTemp, "../img/utilisateurs/" . $nomPhoto);

	$region = $_POST['region'];
	$email = $_POST['email'];
	$login = $_POST['login'];


	if (isset($login)) {
		$filtredLogin = filter_var($login, FILTER_SANITIZE_STRING);
		if (strlen($filtredLogin) < 4) {
			$validationErrors[] = "Erreur!!! Le login doit contenir au moins 4 caratères";
		}
	}
	if (isset($email)) {
		$filtredEmail = filter_var($login, FILTER_SANITIZE_EMAIL);
		if ($filtredEmail != true) {
			$validationErrors[] = "Erreur!!! Email  non valid";
		}
	}
	if (empty($validationErrors)) {
		$requete = $pdo->query("UPDATE utilisateurs SET nom='$nom',prenom='$prenom',image='$nomPhoto',
			id_region='$region',email='$email',login='$login' WHERE id_user='$id'");
		$success_msg = "Le compte est modifié avec succès ! ";
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Connexion</title>
</head>

<body>
	<div class="container col-md-6 col-md-offset-3 " style=" margin-top:20px; text-align:center;">
		<div class="panel panel-info " style=" margin-top:10px; text-align:center;">
			<div class="panel-heading">
				<h3><strong>Editer Profil</strong></h3>
			</div>
			<div class="panel-body">

				<?php

				if (isset($validationErrors) && !empty($validationErrors)) {
					foreach ($validationErrors as $error) {
						echo '<div class="alert alert-danger">' . $error . '</div>';
					}
				}
				if (isset($success_msg) && !empty($success_msg)) {
					echo '<div class="alert alert-success">' . $success_msg . '</div>';

					header('refresh:3;url=loginAdmin.php');
				}
				?>
				<form method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="login"><strong>Nom:</strong></label>
						<input type="text" name="nom" class="form-control" autocomplete="off" value="<?php echo $utilisateur['nom']; ?>" />
					</div>
					<div class="form-group">
						<label for="login"><strong>Prenom:</strong></label>
						<input type="text" name="prenom" class="form-control" autocomplete="off" value="<?php echo $utilisateur['prenom']; ?>" />
					</div>
					<div class="form-group">
						<label for="login"><strong>Image:</strong></label>&nbsp;
						<img src="../img/utilisateurs/<?php echo $_SESSION['user']['image'];  ?>" class="img-circle" alt="Admin" width="33px" height="33px">
						<input type="file" name="photo" class="form-control"  />
					</div>
					<div class="form-group">
						<label for="region"><strong>Region :</strong></label>
						<select class="form-control" name="region" id="IdO">
							<?php
							$requete = "SELECT * from region ";
							$Resultat = $pdo->query($requete);
							?>
							<?php while ($reg = $Resultat->fetch()) { ?>
								<option value="<?php echo $reg['id'] ?>" <?php if ($_GET['region'] == $reg['nom_region']) echo "selected" ?>> <?php echo $reg['nom_region'] ?> </option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="email"><strong>email :</strong></label>
						<input type="email" name="email" class="form-control" autocomplete="off" value="<?php echo $utilisateur['email']; ?>" />
					</div>
					<div class="form-group">
						<label for="login"><strong>Login :</strong></label>
						<input type="text" name="login" class="form-control" autocomplete="off" value="<?php echo $utilisateur['login']; ?>" />
					</div>
					<input type="submit" class="btn btn-info" value="Valider" name="valider">
					&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="submit" class="btn btn-info">
						<a href="changerPwdAdmin.php?r=<?php echo $_GET['region'] ?>" style="color:white;">&nbsp;Changer passe login</a></a>
					</button>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="submit" class="btn btn-info">
						<a href="changerPassAdmin.php?r=<?php echo $_GET['region'] ?>" style="color:white;"> &nbsp;Changer passe acces</a> <br>
					</button>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="submit" class="btn btn-info">
						<a href="espaceTechnicien.php" style="color:white;">&nbsp;Retour</a>
					</button>

				</form>
			</div>
		</div>
	</div>
	</div>
</body>

</html>