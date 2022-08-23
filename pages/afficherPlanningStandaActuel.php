<?php
require_once("menu.php");
require_once("connexionBD.php");
$matin = isset($_GET['m']) ? $_GET['m'] : "";
$soir = isset($_GET['s']) ? $_GET['s'] : "";
$idgroupe = isset($_SESSION['tech']) ? $_SESSION['tech']['id_groupe'] : $_GET['idg'];
$requeteTech = $pdo->query("SELECT * from techniciens where id_groupe=$idgroupe");
$requeteGroupe = $pdo->query("SELECT * from groupes where id='$idgroupe'");
$groupes = $requeteGroupe->fetch();
$auj = date("j-n-Y");
$semaineActu = date("W", strtotime($auj));
$semaineSuiv = $semaineActu + 1;
$requeteJours = $pdo->query("SELECT * from jours where id_semaine='$semaineActu' ");
$jours = $requeteJours->fetchAll();
$idjour = $jours[0]['id'];
$j_len = count($jours);
$countJours = 0;
for ($i = 0; $i < $j_len - 3; $i++) {
    $idjour1 = $jours[$i]['id'];
    $k = $i + 1;
    $idjourSuiv = $jours[$k]['id'];
    $requeteHeures1 = $pdo->query(" SELECT * FROM horaires WHERE  id_jour='$idjour1'");
    $heurs1 = $requeteHeures1->fetchAll();
    $requeteHeures2 = $pdo->query(" SELECT * FROM horaires WHERE  id_jour='$idjourSuiv'");
    $heurs2 = $requeteHeures2->fetchAll();
    $h_len = count($heurs1);
    $countHeures = 0;
    for ($j = 0; $j < $h_len; $j++) {
        if ($heurs1[$j]['etat'] == 1 && $heurs2[$j]['etat'] == 1) {
            $countHeures++;
        }
        if ( $heurs1[$j]['etat'] == 0 && $heurs2[$j]['etat'] == 0 && $heurs1[$j]['absence'] == $heurs2[$j]['absence']) {
            $countHeures++;
        }
    }
    if ($countHeures == 56) {
        $countJours++;
    }
}
$idsamedi = $jours[$j_len - 1]['id'];
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-primary col-md-12   col-md-offset-0" style="text-align: center;margin-top:120px;">
            <div class="panel-heading">
                <b style="font-size:17px;">Groupe <?php echo $groupes['nom_groupe'] . ' - Semaine Actuelle  ' . $semaineActu . ' (Du: ' . $jours[0]['date'] . ' Au ' . $jours[$j_len - 2]['date'] . ')'; ?></b>
                <a href="espaceTechnicien.php?idg=<?php echo $idgroupe; ?>&m=<?php echo $matin ?>&s=<?php echo $soir ?>" style="color:white;float:right;">&nbsp;<b>Retour</b></a>
            </div>
            <div class="panel-body">
                <?php if ($countJours == 4) {  ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="info"><?php echo ' Semaine ' . $semaineSuiv; ?></th>
                                <th>07h00</th>
                                <th>08h00</th>
                                <th>09h00</th>
                                <th>10h00</th>
                                <th>11h00</th>
                                <th>12h00</th>
                                <th>13h00</th>
                                <th>14h00</th>
                                <th>15h00</th>
                                <th>16h00</th>
                                <th>17h00</th>
                                <th>18h00</th>
                                <th>19h00</th>
                                <th>20h00</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($tech = $requeteTech->fetch()) {
                                $idtech = $tech['id'];
                                $requeteHeures = $pdo->query(" SELECT * FROM horaires WHERE id_tech='$idtech' and id_jour='$idjour'");
                            ?> <tr>
                                    <td><?php if ($tech['astreinte'] == 1) {
                                            $idAstreinte = $tech['id'];
                                            $astreinte = 'Astreinte:' . $tech['nom'] . ' ' . $tech['prenom'];
                                        }
                                        echo $tech['nom'] . ' ' . $tech['prenom'] ?> </td>
                                    <?php while ($heures = $requeteHeures->fetch()) { ?>
                                        <td style="background-color:<?php if ($heures['etat'] == 1) {
                                                                        echo 'cornflowerblue';
                                                                    }
                                                                    if ($heures['absence'] == 'Conge' &&  $heures['etat'] == 0) {
                                                                        echo 'green';
                                                                    }
                                                                    if ($heures['absence'] == 'Maladie' && $heures['etat'] == 0) {
                                                                        echo 'red';
                                                                    }   ?>"></td>
                                    <?php  } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="info"><?php echo ' Samedi ' . $jours[$j_len - 2]['date']; ?></th>
                                <th>09h00</th>
                                <th>10h00</th>
                                <th>11h00</th>
                                <th>12h00</th>
                                <th>13h00</th>
                                <th>14h00</th>
                                <th>15h00</th>
                                <th>16h00</th>
                                <th>17h00</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b><?php echo $astreinte  ?></b></td>
                                <?php $requeteSamedi = $pdo->query(" SELECT *FROM horaires WHERE id_tech='$idAstreinte' and id_jour='$idsamedi'");
                                while ($heureSam = $requeteSamedi->fetch()) { ?>
                                    <td style="background-color:<?php if ($heureSam['etat'] == 1) {
                                                                    echo 'cornflowerblue';
                                                                }
                                                                if ($heureSam['absence'] == 'Conge' &&  $heureSam['etat'] == 0) {
                                                                    echo 'green';
                                                                }
                                                                if ($heureSam['absence'] == 'Maladie' && $heureSam['etat'] == 0) {
                                                                    echo 'red';
                                                                }   ?>"></td>
                                <?php  } ?>
                            </tr>
                        </tbody>
                    </table>
                    <table border="1" align="center">
                        <tr>
                            <td style="width:50px;height:20px;text-align: center;background-color:cornflowerblue"><b style=" font-size:12px; color:azure;">Présence</b></td>
                            <td style="width:50px;height:20px;text-align: center;background-color:green"><b style=" font-size:12px; color:azure;">Congé</b></td>
                            <td style="width:50px;height:20px;text-align: center;background-color:red"><b style=" font-size:12px; color:azure;">Maladie</b></td>
                        </tr>
                    </table>
                <?php } else { ?>
                    <br><b style="font-size:17px;color:cornflowerblue;">Le planning n'est plus standard ! Consultez la semaine en détails ! </b><br><br>
                    <button type="submit" class="btn btn-info">
                        <a href="afficherPlanningDetaActuel.php?idg=<?php echo $idgroupe; ?>" style="color:white;"><b>Voir les jours</b></a>
                    </button>
                <?php } ?>


                <div>
                </div>
            </div>
</body>

</html>