<?php
session_start();
if (isset($_SESSION['user'])) {

    require_once('menu.php');
    require_once('connexionBD.php');
    $iduser = isset($_GET['id']) ? $_GET['id'] : 0;
    $idregion = $_SESSION['user']['id_region'];
    $requete = "SELECT * from region where id='$idregion' ";
    $Resultat = $pdo->query($requete);
    $Tab = $Resultat->fetch();
    $requeteGroupe = "SELECT * from groupes where id_region='$idregion' ";
    $ResultatGroupe = $pdo->query($requeteGroupe);
    $grp = $ResultatGroupe->fetchAll();
    if (isset($_POST['valider'])) {
        $groupes = $_POST['groupes'];
        for ($i = 0; $i < count($grp); $i++) {
            $idgrp=$grp[$i]['id'];
            $count = 0;
            for ($k = 0; $k < count($groupes); $k++) {
                if ($grp[$i]['id'] == $groupes[$k]) {
                    $requete1 = $pdo->query("UPDATE groupes set visible=1 where id='$groupes[$k]' and id_region=$idregion ");
                    $count++;
                }
            }
            if ($count == 0) {
                $requeteUpdate = $pdo->query("UPDATE groupes set visible=0 where id='$idgrp' and id_region=$idregion ");
            }
        }
        header('location:utilisateurs.php');
    }
} else {
    header('location:loginAdmin.php');
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Groupes visibles</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-info col-md-6 col-md-offset-3 " style="margin-top:130px;text-align:center;">
            <div class="panel-heading ">
                <h4><b>Groupes visibles de la region <?php echo $Tab['nom_region']; ?></b></h4>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="form-group">
                        <?php for ($j = 0; $j < count($grp); $j++) { ?>
                            <div class="checkbox">
                                <label> <input type="checkbox" name="groupes[]" value="<?php echo ' ' . $grp[$j]['id']; ?>" /> <?php echo ' ' . $grp[$j]['nom_groupe']; ?></label>
                            </div>
                        <?php } ?>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-info" value="Valider" name="valider" />
                    &nbsp;&nbsp;
                    <button type="submit" class="btn btn-info">
                        <a href="utilisateurs.php" style="color:white;">&nbsp;Retour</a>
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>