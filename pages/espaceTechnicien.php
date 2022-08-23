<?php
require_once("menu.php");
require_once("connexionBD.php");
$matin = isset($_GET['m']) ? $_GET['m'] : "";
$soir = isset($_GET['s']) ? $_GET['s'] : "";
$astreinte = isset($_GET['a']) ? $_GET['a'] : "";
$idgroupe = isset($_SESSION['tech']) ? $_SESSION['tech']['id_groupe'] : $_GET['idg'];
$requeteTech = $pdo->query("SELECT * from techniciens where id_groupe='$idgroupe' ");
$requeteGroupe = $pdo->query("SELECT * from groupes where id='$idgroupe'");
$groupes = $requeteGroupe->fetch();

$annee = date("Y");
$auj = date("j-n-Y");
$semaineActu = date("W", strtotime($auj));
$semaineSuiv = $semaineActu + 1;
$requeteJours = $pdo->query("SELECT * from jours where id_semaine='$semaineActu' ");
$jours = $requeteJours->fetchAll();
$j_len = count($jours);
$requeteJoursProch = $pdo->query("SELECT * from jours where id_semaine='$semaineSuiv' ");
$joursProch = $requeteJoursProch->fetchAll();
$jp_len = count($joursProch);
?>
<!DOCTYPE html> 

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body> 
    <div class="panel panel-info col-md-6   col-md-offset-3 " style="margin-top:<?php if (isset($_SESSION['tech'])) {
                                                                                    if ($_SESSION['tech']['role'] == "TeamLeader") {
                                                                                        echo '80px';
                                                                                    } else {
                                                                                        echo '190px';
                                                                                    }
                                                                                } else echo '190px';  ?>;text-align: center;">
        <div class="panel-heading">
            <?php if (isset($_SESSION['tech'])) {
                if ($_SESSION['tech']['role'] == "TeamLeader") { ?>
                    <b style="font-size:17px;">Gestion des plannings</b><br>
                    <b style="font-size:14px;color:cornflowerblue;">Vous êtes désignés pour assurer la fonction de team leader cette semaine !</b>
            <?php }
            } ?>
            <?php if (isset($_SESSION['tech'])) {
                if ($_SESSION['tech']['role'] == "Technicien") { ?>
                    <b style="font-size:18px;">Consultation des plannings</b>
                    <b style="font-size:17px;float:left">Groupe <?php echo $groupes['nom_groupe']; ?></b><br>
                    <b style="font-size:17px;color:cornflowerblue;"><?php echo 'Semaine Actuelle  ' . $semaineActu . ' (Du: ' . $jours[0]['date'] . ' Au: ' . $jours[$j_len - 1]['date'] . ')'; ?></b><br>
                    <b style="font-size:17px;color:cornflowerblue;"><?php echo 'Semaine Prochaine  ' . $semaineSuiv . ' (Du: ' . $joursProch[0]['date'] . ' Au: ' . $joursProch[$jp_len - 1]['date'] . ')'; ?></b>
            <?php }
            } ?> 
             <?php if (isset($_SESSION['user'])) { ?>
                    <b style="font-size:18px;">Consultation des plannings</b>
                    <a href="groupes.php"> <b style="font-size:17px;float:right;">Retour</b></a>
                    <b style="font-size:17px;float:left">Groupe <?php echo $groupes['nom_groupe']; ?></b><br>
                    <b style="font-size:17px;color:cornflowerblue;"><?php echo 'Semaine Actuelle  ' . $semaineActu . ' (Du: ' . $jours[0]['date'] . ' Au: ' . $jours[$j_len - 1]['date'] . ')'; ?></b><br>
                    <b style="font-size:17px;color:cornflowerblue;"><?php echo 'Semaine Prochaine  ' . $semaineSuiv . ' (Du: ' . $joursProch[0]['date'] . ' Au: ' . $joursProch[$jp_len - 1]['date'] . ')'; ?></b>
            <?php  } ?>
           
        </div>
        <div class="panel-body">
            <label>Affichage Standard Par Semaines :</label></label>
            <button type="submit" class="btn btn-info">
                <a href="afficherPlanningStandaActuel.php?idg=<?php echo $idgroupe; ?>&m=<?php echo $matin ?>&s=<?php echo $soir ?>" style="color:white;"><b>Semaine Actuelle</b></b></a>
            </button>&nbsp;&nbsp;
            <button type="submit" class="btn btn-info">
                <a href="afficherPlanningStandaSuivant.php?idg=<?php echo $idgroupe; ?>&m=<?php echo $matin ?>&s=<?php echo $soir ?>&a=<?php echo $astreinte; ?>" style="color:white;"><b>Semaine Prochaine</b></a>
            </button>
            <br><br>
            <label> <span style="margin-left:33px">Affichage Détaillé Par joures :</span></label>
            <button type="submit" class="btn btn-info">
                <a href="afficherPlanningDetaActuel.php?idg=<?php echo $idgroupe; ?>&m=<?php echo $matin ?>&s=<?php echo $soir ?>" style="color:white;"><b>Semaine Actuelle</b></a>
            </button>&nbsp;&nbsp;
            <button type="submit" class="btn btn-info">
                <a href="afficherPlanningDetaSuivant.php?idg=<?php echo $idgroupe; ?>&m=<?php echo $matin ?>&s=<?php echo $soir ?>" style="color:white;"><b>Semaine Prochaine</b></a>
            </button> 
        </div>
    </div>
    <?php if (isset($_SESSION['tech'])) {
        if ($_SESSION['tech']['role'] == "TeamLeader") { ?>
            <div class="panel panel-primary col-md-10   col-md-offset-1" style="text-align: center;margin-top:5px;">
                <div class="panel-heading">
                    <b style="font-size:17px;">Groupe <?php echo $groupes['nom_groupe'] . ' - Semaine Prochaine  ' . $semaineSuiv . ' (Du: ' . $joursProch[0]['date'] . ' Au: ' . $joursProch[$j_len - 2]['date'] . ')'; ?></b>
                    <button style="color:blue;float:right;"><a href="actualiserDate.php" ><b>Actualiser Date</b></a></button>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Groupe</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($tech = $requeteTech->fetch()) { ?>
                                <tr class="<?php echo $tech['etat'] == 1 ? 'info' : 'danger' ?>">
                                    <td><?php echo $tech['id'] ?> </td>
                                    <td><?php echo $tech['nom'] ?> </td>
                                    <td><?php echo $tech['prenom'] ?> </td>
                                    <td><?php echo $groupes['nom_groupe'] ?> </td>
                                    <td><?php echo $tech['role'] ?> </td>
                                    <td>
                                        <a href="creerPlanning.php?id=<?php echo $tech['id'] ?>&m=<?php echo $matin ?>&s=<?php echo $soir ?>&a=<?php echo $tech['astreinte'] == 1 ? $astreinte : ''; ?>">
                                            <img src="../img/icons/planning-standard.png" title="Planning Standard Par Semaine" with="24px" height="24px">
                                        </a>
                                        &nbsp;&nbsp;
                                        <a href="personaliserPlanning.php?id=<?php echo $tech['id'] ?>&m=<?php echo $matin ?>&s=<?php echo $soir ?>&a=<?php echo $tech['astreinte'] == 1 ? $astreinte : ''; ?>">
                                            <img src="../img/icons/planning-perso.png" title="Planning Pérsonalisé Par Jours" with="24px" height="24px">
                                        </a>
                                        &nbsp;&nbsp;
                                        <a href="astreinte.php?id=<?php echo $tech['id'] ?>">
                                            <?php
                                            if ($tech['astreinte'] == 1) {
                                                echo '<img src="../img/icons/astreinte-yes.png" title="Astreinte-oui" with="24px" height="24px" >';
                                            } else {
                                                echo '<img src="../img/icons/astreinte-no.png" title="Astreinte-non" with="24px" height="24px" >';
                                            }
                                            ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
</body>

</html>