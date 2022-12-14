<?php
require_once('securite.php');
require_once('menu.php');
require_once('connexionBD.php');
$id = $_SESSION['tech']['id'];
$requeteSelect = "SELECT * from techniciens WHERE id=$id";
$resultatSelect = $pdo->query($requeteSelect);
$data = $resultatSelect->fetch(); // fetch data
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Changement de mot de passe</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/ShowPwd.js"></script>
</head>

<body style="background-image:url('../img/icons/back.jpg');background-size:cover;" >
    <div class="container ">
        <div class="container col-md-6 col-md-offset-3">
            <div class="panel panel-info " style="margin-top:60px;text-align:center;">
                <div class="panel-heading">
                    <h3><strong>Changer mot de passe</strong></h3>
                    <h4 class="text-center"> Compte : <?php echo $_SESSION['tech']['login_tech'] ?> </h4>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_POST['change'])) {
                        $OldPwd = $_POST['OldPwd'];
                        $NewPwd = $_POST['NewPwd'];
                        $NewPwdConfi = $_POST['NewPwdConfi'];
                        if (MD5($OldPwd) == $data['pwd_tech'] && $NewPwd == $NewPwdConfi) {
                            $requeteModifier = "UPDATE techniciens set pwd_tech=MD5('$NewPwd') where id='$id'";
                            $resultatModifier = $pdo->query($requeteModifier);
                            echo "<div class='alert alert-success'><b>Le mot de passe est modifi?? avec succ??s !</b></div>";
                            header("refresh:3;url=" . $_SERVER['HTTP_REFERER']);
                        } else {
                            echo "<div class='alert alert-danger'><b>Erreur de changement de mot de passe !</b></div>";
                            header("refresh:3;url=" . $_SERVER['HTTP_REFERER']);
                        }
                    }
                    ?>
                    <form method="POST">
                        <div class="form-group">
                            <label class="form-label">Ancien mot de passe : </label>
                            &nbsp;<input type="checkbox" onclick="ShowOldPwd()">&nbsp;<i class="fas fa-eye fa-1x ShowOldPwd"></i>
                            <input type="password" class="form-control OldPwd" id="OldPwd" name="OldPwd" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nouveau mot de passe :</label>
                            &nbsp;<input type="checkbox" onclick="ShowNewPwd()">&nbsp;<i class="fas fa-eye fa-1x ShowNewPwd "></i>
                            <input type="password" class="form-control NewPwd" id="NewPwd" name="NewPwd" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirmer le nouveau mot de passe :</label>
                            &nbsp;<input type="checkbox" onclick="ShowNewPwdConfi()">&nbsp;<i class="fas fa-eye fa-1x ShowNewPwdConfi"></i>
                            <input type="password" class="form-control NewPwdConfi" id="NewPwdConfi" name="NewPwdConfi" required>
                        </div>
                        <input type="submit" class="btn btn-info" value="Valider" name="change" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button type="submit" class="btn btn-info">
                            <a href="modifierProfilTech.php?id=<?php echo $_SESSION['tech']['id'];?>" style="color:white;">&nbsp;Retour</a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>