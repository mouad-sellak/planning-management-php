<?php
include("menu.php");
require_once("connexionBD.php");
$id_region = $_SESSION['user']['id_region'];
$requeteGroupe = "SELECT * from groupes where id_region='$id_region'";
$resultatGroupe = $pdo->query($requeteGroupe);
?>
<!DOCTYPE HTML>
<HTML>

<head>
    <meta charset="utf-8">
    <title>Gestion des groupes</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="margin-top:80px;">
        <?php if ($_SESSION['user']['role'] == "Admin") { ?>
            <div class="panel panel-info col-md-6   col-md-offset-3">
                <div class="panel-heading " style="text-align: center;font-size:17px;"> <b>Gestion des groupes</b> </div>
                <div class="panel-body" style="text-align: center;">
                    <form method="get" class="form-inline">
                        <a href="ajouterGroupe.php">
                            <span class="glyphicon glyphicon-plus"></span>
                            <b>Ajouter Groupe</b>
                        </a>
                        &nbsp;&nbsp;&nbsp;
                    </form>
                </div>
            </div>
            <?php }
        while ($grp = $resultatGroupe->fetch()) {
            $id_groupe = $grp['id'];
            $requeteTech = "SELECT * from techniciens where id_groupe='$id_groupe'";
            $resultatTech = $pdo->query($requeteTech);

            if ($_SESSION['user']['role'] == "Responsable") {
                if ($grp['visible'] == 1) {
            ?>
                    <div class="panel panel-primary col-md-8   col-md-offset-2 ">
                        <div class="panel-heading" style="text-align: center;">
                            <button><a href="espaceTechnicien.php?idg=<?php echo $id_groupe ?>" style="color:blue;"><b>Planning du Groupe <?php echo $grp['nom_groupe'] ?></b></a></button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a title="Modifier Groupe" href="modifierGroupe.php?idg=<?php echo $id_groupe ?>"><img src="../img/icons/edit.png" with="20px" height="20px"></a>&nbsp;
                            <a title="Supprimer Groupe" onclick="return confirm('Etes vous sur')" href="supprimerGroupe.php?idg=<?php echo $id_groupe ?>"> <img src="../img/icons/trash.png" with="20px" height="20px"></a>
                        </div>
                        <div class="panel-body" style="text-align: center;">
                            <table class="table table-striped table-bordered" style="text-align: center;">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Techniciens</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td class="info" rowspan="5"><img src="../img/groupes/<?php echo $grp['image']; ?>" alt="Admin" width="200px" height="150px" style="margin-top:15px;"> </td>
                                    <?php while ($tech = $resultatTech->fetch()) {  ?>
                                        <tr class="info">
                                            <td> <?php
                                                    if ($tech['role'] == "TeamLeader") {
                                                        echo $tech['nom'];
                                                        echo ' ' . '<img src="../img/icons/team-leader-yes.png" title="Team Leader" with="16px" height="16px" style="margin-top:-5px">';
                                                    } else {
                                                        echo $tech['nom'];
                                                    }
                                                    ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php }
            }

            if ($_SESSION['user']['role'] == "Admin") {
                ?>
                <div class="panel panel-primary col-md-8   col-md-offset-2 ">
                    <div class="panel-heading" style="text-align: center;">
                        <button><a href="espaceTechnicien.php?idg=<?php echo $id_groupe ?>" style="color:blue;"><b>Planning du Groupe <?php echo $grp['nom_groupe'] ?></b></a></button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a title="Modifier Groupe" href="modifierGroupe.php?idg=<?php echo $id_groupe ?>"><img src="../img/icons/edit.png" with="20px" height="20px"></a>&nbsp;
                        <a title="Supprimer Groupe" onclick="return confirm('Etes vous sur')" href="supprimerGroupe.php?idg=<?php echo $id_groupe ?>"> <img src="../img/icons/trash.png" with="20px" height="20px"></a>
                    </div>
                    <div class="panel-body" style="text-align: center;">
                        <table class="table table-striped table-bordered" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Techniciens</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td class="info" rowspan="5"><img src="../img/groupes/<?php echo $grp['image']; ?>" alt="Admin" width="200px" height="150px" style="margin-top:15px;"> </td>
                                <?php while ($tech = $resultatTech->fetch()) {  ?>
                                    <tr class="info">
                                        <td> <?php
                                                if ($tech['role'] == "TeamLeader") {
                                                    echo $tech['nom'];
                                                    echo ' ' . '<img src="../img/icons/team-leader-yes.png" title="Team Leader" with="16px" height="16px" style="margin-top:-5px">';
                                                } else {
                                                    echo $tech['nom'];
                                                }
                                                ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        <?php  }
        }  ?>

    </div>
</body>

</HTML>