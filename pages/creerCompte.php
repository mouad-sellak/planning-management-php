<?php
require_once("connexionBD.php");
require_once("fonctions.php");
$validationErrors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];

  $nomPhoto = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";
  $imageTemp = $_FILES['photo']['tmp_name'];
  move_uploaded_file($imageTemp, "../img/utilisateurs/" . $nomPhoto);

  $region = $_POST['region'];
  $email = $_POST['email'];
  $login = $_POST['login'];
  $pwd1 = $_POST['mdp'];
  $pwd2 = $_POST['mdpConfi'];
  

  if (isset($login)) {
    $filtredLogin = filter_var($login, FILTER_SANITIZE_STRING);
    if (strlen($filtredLogin) < 4) {
      $validationErrors[] = " Le login doit contenir au moins 4 caratères !";
    }
  }
  if (isset($pwd1) && isset($pwd2)) {
    if (empty($pwd1)) {
      $validationErrors[] = " Le mot ne doit pas etre vide !";
    }
    if (md5($pwd1) !== md5($pwd2)) {
      $validationErrors[] = "Les deux mot de passe ne sont pas identiques !";
    }
  }
  if (isset($email)) {
    $filtredEmail = filter_var($login, FILTER_SANITIZE_EMAIL);
    if ($filtredEmail != true) {
      $validationErrors[] = " Email  non valid !";
    }
  }
  if (empty($validationErrors)) {
    if (rechercher_par_login($login) == 0 & rechercher_par_email($email) == 0) {
      $requete = $pdo->query("INSERT INTO utilisateurs(nom,prenom,image,role,etat,id_region,email,login,pass,admin_pass) 
                                 VALUES( '$nom','$prenom','$nomPhoto','Responsable',0,'$region','$email','$login',MD5('$pwd1'),MD5('0000'))");

      $success_msg = "Le compte est crée, avec succès !";
    } else {
      if (rechercher_par_login($login) > 0) {
        $validationErrors[] = 'Désolé le login exsite deja';
      }
      if (rechercher_par_email($email) > 0) {
        $validationErrors[] = 'Désolé cet email exsite deja';
      }
    }
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

<body style="background-image:url('../img/icons/back.jpg');background-size:cover;" >
  <div class="container col-md-8 col-md-offset-2 ">
    <div class="panel panel-info " style=" margin-top:10px; text-align:center;">
      <div class="panel-heading">
        <h2><strong>Nouveau Compte Admin</strong></h2>
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

          header('refresh:5;url=loginAdmin.php');
        }

        ?>
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="login"><strong>Nom:</strong></label>
            <input type="text" name="nom" class="form-control" autocomplete="off" />
          </div>
          <div class="form-group">
            <label for="login"><strong>Prenom:</strong></label>
            <input type="text" name="prenom" class="form-control" autocomplete="off" />
          </div>
          <div class="form-group">
            <label for="login"><strong>Image:</strong></label>
            <input type="file" name="photo" class="form-control" />
          </div>

          <div class="form-group">
            <label for="region"><strong>Region :</strong></label>
            <select class="form-control" name="region" id="IdO">
              <?php
              $requete = "SELECT * from region ";
              $Resultat = $pdo->query($requete);
              ?>
              <?php while ($reg = $Resultat->fetch()) { ?>
                <option value="<?php echo $reg['id'] ?>"> <?php echo $reg['nom_region'] ?> </option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="email"><strong>email :</strong></label>
            <input type="email" name="email" class="form-control" autocomplete="off" />
          </div>
          <div class="form-group">
            <label for="login"><strong>Login :</strong></label>
            <input type="text" name="login" class="form-control" autocomplete="off" />
          </div>

          <div class="form-group">
            <label for="pwd"><strong>Mot de passe :</strong></label>
            <input type="password" name="mdp" class="form-control" />
          </div>
          <div class="form-group">
            <label for="pwdConfi"><strong>Confirmer mot de passe :</strong></label>
            <input type="password" name="mdpConfi" class="form-control" />
          </div>
          <button type="submit" class="btn btn-info" name="valider">
            <span class="glyphicon glyphicon-log-in"></span>
            <strong>Valider</strong>
          </button>
          &nbsp;&nbsp;&nbsp;
          <button type="submit" class="btn btn-info">
                        <a href="LoginAdmin.php" style="color:white;">&nbsp;Retour</a>
                    </button>

          <br><br>
        </form>
      </div>
    </div>
  </div>
  </div>
</body>

</html>