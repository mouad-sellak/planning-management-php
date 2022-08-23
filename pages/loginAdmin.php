<?php
session_start();
if (isset($_SESSION['erreurLoginAdmin']))
  $erreurLogin = $_SESSION['erreurLoginAdmin'];
else {
  $erreurLogin = "";
}
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <script src="jquery-3.5.1.min.js"></script>
    <script src="../js/ShowPwd.js"></script>
  <title>Connexion</title>
</head>

<body style="background-image:url('../img/icons/back.jpg');background-size:cover;"  >
  <div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
    <div class="panel panel-info " style="margin-top:130px;text-align:center;">
      <div class="panel-heading">
        <h2><strong>Connexion</strong></h2>
      </div>
      <div class="panel-body">
        <form method="POST" action="connexionAdmin.php">
          <?php if (!empty($erreurLogin)) { ?>
            <div class="alert alert-danger">
              <?php echo $erreurLogin ?>
            </div>
          <?php } ?>
          <div class="form-group">
            <label for="login"><strong>Login :</strong></label>
            <input type="text" name="login" class="form-control" autocomplete="off" />
          </div>
          <div class="form-group">
            <label for="pwd"><strong>Mot de passe :</strong></label>
            &nbsp;<input type="checkbox" onclick="ShowNewPwd()">&nbsp;<i class="fas fa-eye fa-1x ShowNewPwd "></i>
            <input type="password" name="mdp" id="NewPwd" class="form-control" />
          </div>
          <button type="submit" class="btn btn-info">
            <span class="glyphicon glyphicon-log-in"></span>
            <strong>Valider</strong>
          </button>
          &nbsp;&nbsp;
          <button type="submit" class="btn btn-info">
            <a href="home.php" style="color:white;">&nbsp;Retour</a>
          </button>
          <br><br>
          <p class="text-center">
            <a href="InitialiserPassAdmin.php"><strong>Mot de passe Oublié</strong></a> &nbsp; &nbsp;
            <a href="creerCompte.php"><strong>Nouveau Compte</strong></a>
          </p>
        </form>
      </div>
    </div>
  </div>
  </div>
</body>

</html>