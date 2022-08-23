<?php
session_start();
require_once("connexionBD.php");
require_once('menu.php');
$OldPwd = isset($_POST['OldPwd'])?$_POST['OldPwd']:MD5('0000');
$requete="SELECT admin_pass from utilisateurs where admin_pass=MD5('$OldPwd')";
$Resultat=$pdo->query($requete);
if (isset($_POST['change'])) { // when click on Update button
    $NewPwd = $_POST['NewPwd'];
    $NewPwdConfi = $_POST['NewPwdConfi'];
    if ($Pwd = $Resultat->fetch() && $NewPwd == $NewPwdConfi) {
        $requeteModifier = "UPDATE utilisateurs set admin_pass=MD5('$NewPwd') where  admin_pass=MD5('$OldPwd')";
        $resultatModifier = $pdo->query($requeteModifier);
        $alert="<div class='alert alert-success'><b>Le mot de passe est modifié avec succès !</b></div>";
        header("refresh:2;url=" . $_SERVER['HTTP_REFERER']);
    } else {
        echo "<div class='alert alert-danger'><b>Erreur de changement de mot de passe !</b></div>";
        header("refresh:2;url=" . $_SERVER['HTTP_REFERER']);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Editer profil</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <script src="../js/ShowPwd.js"></script>
</head>

<body  >
    <div class="container">
        <div class="panel panel-info col-md-6 col-md-offset-3 " style="margin-top:130px;text-align:center;">
            <div class="panel-heading ">
                <h3><strong>Changer mot de passe accès admin</strong></h3>
            </div>
            <div class="panel-body">
            <?php if(isset($_POST['change'])) echo $alert; ?>
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
                    &nbsp;&nbsp;
                    <button type="submit" class="btn btn-info">
                        <a href="modifierProfilAdmin.php?id=<?php echo $_SESSION['user']['id_user']; ?>&region=<?php echo $_GET['r']; ?>" style="color:white;">&nbsp;Retour</a>
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>