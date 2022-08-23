<?php
require_once('menu.php');
require_once("connexionBD.php");
$idg=$_GET['idg'];
$requete=$pdo->query("SELECT * from groupes where id='$idg' ");
if ( isset($_POST['valider'])  ){
    $nom = $_POST['nom'];
    $nomPhoto = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";
    $imageTemp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp, "../img/groupes/" . $nomPhoto);
    $id_region = $_SESSION['user']['id_region'];
    $RequeteRegion = "SELECT * from region where id='$id_region'";
    $ResultatRegion = $pdo->query($RequeteRegion);
    $tab = $ResultatRegion->fetch();
    $idregion = $tab['id'];
    $Requete ="UPDATE  groupes SET nom_groupe='$nom',image='$nomPhoto',id_region='$idregion' where id='$idg' and id_region='$idregion'   ";
    $Resultat=$pdo->query($Requete);                                        
    $alert="<div class='alert alert-success'><b>Le groupe est modifié avec succès !</b></div>";
    header("refresh:3;url=groupes.php");
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
        <div class="panel panel-info " style=" margin-top:100px; text-align:center;">
            <div class="panel-heading">
                <h3><strong>Modifier Groupe</strong></h3>
            </div>
            <div class="panel-body">
            <?php if(isset($_POST['valider'])) echo $alert; ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="login"><strong>Nom:</strong></label>
                        <input type="text" name="nom" class="form-control" autocomplete="off" value="<?php echo $requete->fetch()['nom_groupe'];  ?>"  />
                    </div>
                    <div class="form-group">
                        <label for="login"><strong>Image:</strong></label>
                        <input type="file" name="photo" class="form-control" />
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