<?php
require_once("menu.php");
require_once("connexionBD.php");
$idgroupe = isset($_SESSION['tech']) ? $_SESSION['tech']['id_groupe'] : $_GET['idg'];
$requeteTech = $pdo->query("SELECT * from techniciens where id_groupe=$idgroupe");
$tech = $requeteTech->fetchAll();
$t_len = count($tech);
$requeteGroupe = $pdo->query("SELECT * from groupes where id='$idgroupe'");
$groupes = $requeteGroupe->fetch();
$annee = date("Y");
$auj = date("j-n-Y");
$semaineActu = date("W", strtotime($auj));
$semaineSuiv = $semaineActu + 1;
$requeteJours = $pdo->query("SELECT * from jours where id_semaine='$semaineActu' ");
$jours = $requeteJours->fetchAll();
$j_len = count($jours);
$idsamedi = $jours[$j_len - 2]['id'];
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> -->
</head>

<body>
    <div class="container">
        <div class="panel panel-primary col-md-12   col-md-offset-0" style="text-align: center;margin-top:70px;">
            <div class="panel-heading">
                <b style="font-size:17px;">Groupe <?php echo $groupes['nom_groupe'] . ' - Semaine Actuelle  ' . $semaineActu . ' (Du: ' . $jours[0]['date'] . ' Au ' . $jours[$j_len - 1]['date'] . ')'; ?></b>
                <a href="espaceTechnicien.php?idg=<?php echo $idgroupe; ?>" style="color:white;float:right;">&nbsp;<b>Retour</b></a>

            </div>
            <div class="panel-body">
                <table border="1" align="center" >
                    <tr>
                        <td style="width:50px;height:20px;text-align: center;background-color:cornflowerblue"><b style=" font-size:12px; color:azure;">Présence</b></td>
                        <td style="width:50px;height:20px;text-align: center;background-color:green"><b style=" font-size:12px; color:azure;">Congé</b></td>
                        <td style="width:50px;height:20px;text-align: center;background-color:red"><b style=" font-size:12px; color:azure;">Maladie</b></td>
                    </tr>
                </table>
                <br>
                <?php for ($i = 0; $i < $j_len - 2; $i++) {
                    $idjour = $jours[$i]['id'];
                ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="info"><?php echo $jours[$i]['jour'] . ' (' . $jours[$i]['date'] . ')'; ?></th>
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
                            <?php for ($j = 0; $j < $t_len; $j++) {
                                $idtech = $tech[$j]['id'];
                                $requeteHeures = $pdo->query(" SELECT * FROM horaires WHERE id_tech='$idtech' and id_jour='$idjour'  ");
                            ?> <tr>
                                    <td><?php if ($tech[$j]['astreinte'] == 1) {
                                            $idAstreinte = $tech[$j]['id'];
                                            $astreinte = 'Astreinte:' . $tech[$j]['nom'] . ' ' . $tech[$j]['prenom'];
                                        }
                                        echo $tech[$j]['nom'] . ' ' . $tech[$j]['prenom'] ?> </td>
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
                <?php } ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="info"><?php echo ' Samedi ' . $jours[$j_len - 1]['date']; ?></th>
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
                            ?>
                            <?php while ($heureSam = $requeteSamedi->fetch()) { ?>
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
                <div>
                </div>
            </div>
</body>

</html>