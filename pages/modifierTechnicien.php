<?php
require_once('menu.php');
require_once("connexionBD.php");
$idgroupe = isset($_GET['idgroupe']) ? $_GET['idgroupe'] : 0;
$id_region = $_SESSION['user']['id_region'];
$requeteGroupe = "select * from groupes where id_region='$id_region'";
$resultatGroupe = $pdo->query($requeteGroupe);

$valider = isset($_POST['valider']) ? $_POST['valider'] : "";
if ($valider) { 
    $nom = $_POST['nom'];
    $nomPhoto = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";
    $imageTemp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp, "../img/groupes/" . $nomPhoto);
    $id_region = $_SESSION['user']['id_region'];
    $requete = "SELECT * from region where id='$id_region'";
    $Resultat = $pdo->query($requete);
    $tab = $Resultat->fetch();
    $region = $tab['id'];
    $Requete = $pdo->query("INSERT INTO groupes(nom,image,id_region) 
                                 VALUES( '$nom','$nomPhoto','$region')");
    echo "<div class='alert alert-success'><b>Le groupe est ajouté avec succès !</b></div>";
    header("refresh:2;url=" . $_SERVER['HTTP_REFERER']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Modifier technicien</title>
</head>

<body>
    <div class="container col-md-6 col-md-offset-3 ">
        <div class="panel panel-info " style=" margin-top:100px; text-align:center;">
            <div class="panel-heading">
                <h3><strong>Modifier Technicien</strong></h3>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="login"><strong>Nom:</strong></label>
                        <input type="text" name="nom" class="form-control" autocomplete="off"  />
                    </div>
                    <div class="form-group">
                        <label for="login"><strong>Prenom:</strong></label>
                        <input type="text" name="prenom" class="form-control" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="idgroupe">Groupe:</label>
                        <select name="idgroupe" class="form-control" id="idgroupe" onchange="this.form.submit()">
                            <?php while ($grp = $resultatGroupe->fetch()) { ?>
                                <option value="<?php echo $grp['id'] ?>" <?php if ($grp['id'] === $idgroupe) echo "selected" ?> >
                                    <?php echo $grp['nom_groupe'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-info" value="Valider" name="valider">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-info">
                        <a href="groupes.php" style="color:white;">&nbsp;Retour</a>
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>