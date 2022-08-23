<?php
require_once("menu.php");
require_once("connexionBD.php");
$nomPrenom = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
$idgroupe = isset($_GET['idgroupe']) ? $_GET['idgroupe'] : 0;
$size = isset($_GET['size']) ? $_GET['size'] : 4;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $size;
$id_region = $_SESSION['user']['id_region'];
$requeteGroupe = "select * from groupes where id_region='$id_region'";
if ($idgroupe == 0) {
    $requeteTech = "SELECT  techniciens.*,groupes.nom_groupe 
                from techniciens 
                inner join groupes on groupes.id=techniciens.id_groupe
                where groupes.id=techniciens.id_groupe
                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                and groupes.id_region='$id_region'
                order by techniciens.id
                limit $size
                offset $offset";
    $requeteCount = "SELECT count(*) countT from techniciens
    inner join groupes on groupes.id=techniciens.id_groupe
    where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%') and groupes.id_region='$id_region'    ";
} else {
    $requeteTech = "SELECT  techniciens.*,groupes.nom_groupe  
    from techniciens 
    inner join groupes on groupes.id=techniciens.id_groupe
    where groupes.id=techniciens.id_groupe
    and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
    and id_groupe='$idgroupe'
    and groupes.id_region='$id_region'
    order by techniciens.id
    limit $size
    offset $offset";
    $requeteCount = "SELECT count(*) countT from techniciens 
    inner join groupes on groupes.id=techniciens.id_groupe
    where  groupes.id_region='$id_region' and id_groupe='$idgroupe' and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%') ";
}
$resultatGroupe = $pdo->query($requeteGroupe);
$resultatTech = $pdo->query($requeteTech);
$resultatCount = $pdo->query($requeteCount);
$tabCount = $resultatCount->fetch();
$nbTech = $tabCount['countT'];
$reste = $nbTech % $size;
if ($reste === 0)
    $nbrPage = $nbTech / $size;
else
    $nbrPage = floor($nbTech / $size) + 1;
?>
<!DOCTYPE HTML>
<HTML>

<head>
    <meta charset="utf-8">
    <title>Gestion des techniciens</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>

<body>

    <div class="container">
        <div class="panel panel-info col-md-10   col-md-offset-1 " style="margin-top:80px;text-align: center;">
            <div class="panel-heading"> <b style="font-size:17px;">Gestion des techniciens</b> </div>
            <div class="panel-body">
                <form class="form-inline">
                    <div class="form-group">
                        <input type="text" name="nomPrenom" placeholder="Nom et prénom" class="form-control" value="<?php echo $nomPrenom ?>" />
                    </div>
                    <button type="submit" class="btn btn-info">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                    <label for="idgroupe">Groupe:</label>
                    <select name="idgroupe" class="form-control" id="idgroupe" onchange="this.form.submit()">
                        <option value=0>Tous les groupes</option>
                        <?php while ($grp = $resultatGroupe->fetch()) { ?>
                            <option value="<?php echo $grp['id'] ?>" <?php if ($grp['id'] === $idgroupe) echo "selected" ?>>
                                <?php echo $grp['nom_groupe'] ?>
                            </option>
                        <?php } ?>
                    </select>&nbsp;&nbsp;
                    <a href="ajouterTechnicien.php">
                        <span class="glyphicon glyphicon-plus"></span>
                        Ajouter Technicien
                    </a> &nbsp; &nbsp;
                    <span style="color:cornflowerblue; ">
                        Montrer
                        <select name="size" style="color:black;" onchange="this.form.submit()">
                            <option value="4" <?php if ($size == 4) echo "selected" ?>>4</option>
                            <option value="8" <?php if ($size == 8) echo "selected" ?>>8</option>
                            <option value="16" <?php if ($size == 16) echo "selected" ?>>16</option>
                            <option value="25" <?php if ($size == 25) echo "selected" ?>>25</option>
                        </select>
                        unité
                    </span>
                </form>
            </div>
        </div>

        <div class="panel panel-primary col-md-10   col-md-offset-1" style="text-align: center;">
            <div class="panel-heading"> <b style="font-size:17px;">Liste des Techniciens (<?php echo $nbTech ?> techniciens)</b> </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Groupe</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($tech = $resultatTech->fetch()) { ?>
                            <tr class="<?php echo $tech['etat'] == 1 ? 'info' : 'danger' ?>">
                                <td><?php echo $tech['nom'] ?> </td>
                                <td><?php echo $tech['prenom'] ?> </td>
                                <td><?php echo $tech['nom_groupe'] ?> </td>
                                <td><?php echo $tech['role'] ?> </td>
                                <td>  
                                    &nbsp;
                                    <a title="Supprimer technicien" onclick="return confirm('Vous confirmer la suppression ?')" href="supprimerTechnicien.php?idT=<?php echo $tech['id'] ?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    &nbsp;
                                    <a title="Activer technicien" href="activerTechnicien.php?id=<?php echo $tech['id'] ?>&etat=<?php echo $tech['etat']  ?>&nomPrenom=<?php echo $nomPrenom  ?>&idgroupe=<?php echo $idgroupe  ?>&size=<?php echo $size  ?>&page=<?php echo $page  ?>">
                                        <?php
                                        if ($tech['etat'] == 1)
                                            echo '<span class="glyphicon glyphicon-remove"></span>';
                                        else
                                            echo '<span class="glyphicon glyphicon-ok"></span>';
                                        ?>
                                    </a>
                                    &nbsp;
                                    <a href="teamLeader.php?id=<?php echo $tech['id'] ?>&role=<?php echo $tech['role']  ?>&nomPrenom=<?php echo $nomPrenom  ?>&idgroupe=<?php echo $idgroupe  ?>&size=<?php echo $size  ?>&page=<?php echo $page  ?>">
                                        <?php
                                        if ($tech['role'] == "TeamLeader")
                                            echo '<img src="../img/icons/team-leader-yes.png" title="Team Leader" with="16px" height="16px" style="margin-top:-5px">';
                                        else
                                            echo '<img src="../img/icons/team-leader-no.png" title="Technicien" with="16px" height="16px" style="margin-top:-5px">';
                                        ?>
                                    </a>&nbsp;
                                </td>
                                <?php //} 
                                ?>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $nbrPage; $i++) { ?>
                            <li class="<?php if ($i == $page) echo 'active' ?>">
                                <a href="techniciens.php?page=<?php echo $i; ?>&nomPrenom=<?php echo $nomPrenom ?>&idgroupe=<?php echo $idgroupe ?>&size=<?php echo $size ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</HTML>