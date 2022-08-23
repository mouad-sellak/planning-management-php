<?php
require_once('securite.php');
require_once('menu.php');
require_once("connexionBD.php");
$id_region = $_SESSION['user']['id_region'];
$requeteGroupe = "select * from groupes where id_region='$id_region'";
$resultatGroupe = $pdo->query($requeteGroupe);
//$valider = isset($_POST['valider']) ? $_POST['valider'] : "";
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['idgroupe']) && !empty($_POST['email']) && !empty($_POST['login']) && !empty($_POST['pwd'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $idgroupe = $_POST['idgroupe'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    $role="technicien";
    $etat=0;
    $Requete = "INSERT into techniciens(nom,prenom,id_groupe,role,etat,email_tech,login_tech,pwd_tech) VALUES( '$nom','$prenom','$idgroupe','$role','$etat','$email','$login',MD5('$pwd'))";
    $Resultat = $pdo->query($Requete);
    $to = $email;
    $objet = "Compte Technicien";
    $content = "Votre Compte : " ."\r\n". " -login: " . $login. "\r\n" ." -Mot de passe : ".$pwd;
    $entetes = "From: MouSel" . "\r\n" . "CC: mouaadsellak123@gmail.com";
    mail($to, $objet, $content, $entetes);
    $alert = "<div class='alert alert-success'><b>Le technicien est ajouté avec succès ! </b> <br> <b> Un mail est envoyé au technicien ! </b>  </div>";
    header("refresh:3;url=" . $_SERVER['HTTP_REFERER']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Ajouter groupe</title>
</head>

<body>
    <div class="container col-md-6 col-md-offset-3 ">
        <div class="panel panel-info " style=" margin-top:30px; text-align:center;">
            <div class="panel-heading">
                <h3><strong>Ajouter Technicien</strong></h3>
            </div>
            <div class="panel-body">
                <?php if (isset($_POST['valider'])) echo $alert; ?>
                <form method="POST" action="ajouterTechnicien.php">
                    <div class="form-group">
                        <label for="login"><strong>Nom:</strong></label>
                        <input type="text" name="nom" class="form-control" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="login"><strong>Prenom:</strong></label>
                        <input type="text" name="prenom" class="form-control" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="idgroupe">Groupe:</label>
                        <select name="idgroupe" class="form-control" id="idgroupe">
                            <?php while ($grp = $resultatGroupe->fetch()) { ?>
                                <option value="<?php echo $grp['id'] ?>">
                                    <?php echo $grp['nom_groupe'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="login"><strong>Email:</strong></label>
                        <input type="email" name="email" class="form-control" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="login"><strong>Login:</strong></label>
                        <input type="text" name="login" class="form-control" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="login"><strong>Mot de passe:</strong></label>
                        <input type="password" name="pwd" class="form-control" autocomplete="off" />
                    </div>
                    <input type="submit" class="btn btn-info" value="Valider" name="valider">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-info">
                        <a href="techniciens.php" style="color:white;">&nbsp;Retour</a>
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>