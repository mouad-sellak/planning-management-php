<?php
require_once("menu.php");
require_once("connexionBD.php");
$idgroupe = $_SESSION['tech']['id_groupe'];
$idtech = $_GET['id'];
$requeteTech = $pdo->query("SELECT * from techniciens where id='$idtech' ");
$requeteGroupe = $pdo->query("SELECT * from groupes where id='$idgroupe'");
$tech = $requeteTech->fetch();
$idtech = $tech['id'];
$groupes = $requeteGroupe->fetch();
$annee = date("Y");
$auj = date("j-n-Y");
$semaineActu = date("W", strtotime($auj));
$semaineSuiv = $semaineActu + 1;
$requeteJours = $pdo->query("SELECT * from jours where id_semaine='$semaineSuiv'");
$jours = $requeteJours->fetchAll();
$j_len = count($jours);
$idjourstandard = $jours[0]['id'];
$idsamedi = $jours[$j_len - 1]['id'];
$matins = isset($_POST['matins']) ? $_POST['matins'] : $_GET['m'];
$astreinte = isset($_POST['astreinte']) ? $_POST['astreinte'] : $_GET['a'];
$ids = array();
if (isset($_POST['valider'])) {
    foreach ($matins as $matin) {
        if ($matin == "7-12-" . $idjourstandard) {
            $requete7h = $pdo->query("UPDATE horaires set etat=1 where heure='07h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete8h = $pdo->query("UPDATE horaires set etat=1 where heure='08h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set etat=1 where heure='09h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete10h = $pdo->query("UPDATE horaires set etat=1 where heure='10h00' and id_tech='$idtech' and id_jour='$idjourstandard'  ");
            $requete11h = $pdo->query("UPDATE horaires set etat=1 where heure='11h00' and id_tech='$idtech' and id_jour='$idjourstandard'  ");
            $requete14h = $pdo->query("UPDATE horaires set etat=1 where heure='14h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete15h = $pdo->query("UPDATE horaires set etat=1 where heure='15h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete16h = $pdo->query("UPDATE horaires set etat=1 where heure='16h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requeteUpdate = $pdo->query("UPDATE horaires set etat=0, absence='Non' where heure!='07h00' and heure!='08h00' and heure!='09h00' and heure!='10h00' and heure!='11h00' and heure!='14h00' and heure!='15h00' and heure!='16h00' and id_tech='$idtech' and id_jour='$idjourstandard'  ");
        }
        if ($matin == "8-13-" . $idjourstandard) {
            $requete7h = $pdo->query("UPDATE horaires set etat=1 where heure='08h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete8h = $pdo->query("UPDATE horaires set etat=1 where heure='09h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set etat=1 where heure='10h00 ' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete10h = $pdo->query("UPDATE horaires set etat=1 where heure='11h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete11h = $pdo->query("UPDATE horaires set etat=1 where heure='12h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete14h = $pdo->query("UPDATE horaires set etat=1 where heure='15h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete15h = $pdo->query("UPDATE horaires set etat=1 where heure='16h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete16h = $pdo->query("UPDATE horaires set etat=1 where heure='17h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requeteUpdate = $pdo->query("UPDATE horaires set etat=0, absence='Non' where heure!='08h00' and heure!='09h00' and heure!='10h00' and heure!='11h00' and heure!='12h00' and heure!='15h00' and heure!='16h00' and heure!='17h00' and id_tech='$idtech' and id_jour='$idjourstandard'  ");
        }
        if ($matin == "9-14-" . $idjourstandard) {
            $requete7h = $pdo->query("UPDATE horaires set etat=1 where heure='09h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete8h = $pdo->query("UPDATE horaires set etat=1 where heure='10h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set etat=1 where heure='11h00 ' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete10h = $pdo->query("UPDATE horaires set etat=1 where heure='12h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete11h = $pdo->query("UPDATE horaires set etat=1 where heure='13h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete14h = $pdo->query("UPDATE horaires set etat=1 where heure='16h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete15h = $pdo->query("UPDATE horaires set etat=1 where heure='17h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete16h = $pdo->query("UPDATE horaires set etat=1 where heure='18h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requeteUpdate = $pdo->query("UPDATE horaires set etat=0, absence='Non' where heure!='09h00' and heure!='10h00' and heure!='11h00' and heure!='12h00' and heure!='13h00'  and heure!='16h00'  and heure!='17h00'  and heure!='18h00' and id_tech='$idtech' and id_jour='$idjourstandard'  ");
        }
        if ($matin == "10-15-" . $idjourstandard) {
            $requete7h = $pdo->query("UPDATE horaires set etat=1 where heure='10h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete8h = $pdo->query("UPDATE horaires set etat=1 where heure='11h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set etat=1 where heure='12h00 ' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete10h = $pdo->query("UPDATE horaires set etat=1 where heure='13h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete11h = $pdo->query("UPDATE horaires set etat=1 where heure='14h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete14h = $pdo->query("UPDATE horaires set etat=1 where heure='17h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete15h = $pdo->query("UPDATE horaires set etat=1 where heure='18h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete16h = $pdo->query("UPDATE horaires set etat=1 where heure='19h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requeteUpdate = $pdo->query("UPDATE horaires set etat=0, absence='Non' where heure!='10h00' and heure!='11h00' and heure!='12h00' and heure!='13h00' and heure!='17h00' and heure!='18h00' and heure!='19h00' and heure!='14h00' and id_tech='$idtech' and id_jour='$idjourstandard'  ");
        }
        if ($matin == "MatCon-" . $idjourstandard) {
            $requete7h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='07h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete8h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='08h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='09h00 ' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete10h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='10h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete11h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='11h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete11h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='12h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete11h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='13h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete7h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='14h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete8h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='15h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='16h00 ' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete7h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='17h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete8h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='18h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='19h00 ' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='20h00 ' and id_tech='$idtech' and id_jour='$idjourstandard' ");
        }
        if ($matin == "MatMal-" . $idjourstandard) {
            $requete7h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='07h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete8h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='08h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='09h00 ' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete10h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='10h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete11h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='11h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete11h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='12h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete11h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='13h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete7h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='14h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete8h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='15h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='16h00 ' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete7h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='17h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete8h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='18h00' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='19h00 ' and id_tech='$idtech' and id_jour='$idjourstandard' ");
            $requete9h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='20h00 ' and id_tech='$idtech' and id_jour='$idjourstandard' ");
        }
        $idjourstandard++;
    }
    if ($astreinte == "09-13") {
        $requete7h = $pdo->query("UPDATE horaires set etat=1 where heure='09h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete8h = $pdo->query("UPDATE horaires set etat=1 where heure='10h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete9h = $pdo->query("UPDATE horaires set etat=1 where heure='11h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete10h = $pdo->query("UPDATE horaires set etat=1 where heure='12h00' and id_tech='$idtech' and id_jour='$idsamedi'  ");
        $requeteUpdate = $pdo->query("UPDATE horaires set etat=0, absence='Non' where heure!='09h00' and heure!='10h00' and heure!='11h00' and heure!='12h00' and id_tech='$idtech' and id_jour='$idsamedi'  ");
    }
    if ($astreinte == "10-14") {
        $requete7h = $pdo->query("UPDATE horaires set etat=1 where heure='10h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete8h = $pdo->query("UPDATE horaires set etat=1 where heure='11h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete9h = $pdo->query("UPDATE horaires set etat=1 where heure='12h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete10h = $pdo->query("UPDATE horaires set etat=1 where heure='13h00' and id_tech='$idtech' and id_jour='$idsamedi'  ");
        $requeteUpdate = $pdo->query("UPDATE horaires set etat=0, absence='Non' where heure!='10h00' and heure!='11h00' and heure!='12h00' and heure!='13h00'  and id_tech='$idtech' and id_jour='$idsamedi'  ");
    }
    if ($astreinte == "11-15") {
        $requete7h = $pdo->query("UPDATE horaires set etat=1 where heure='11h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete8h = $pdo->query("UPDATE horaires set etat=1 where heure='12h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete9h = $pdo->query("UPDATE horaires set etat=1 where heure='13h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete10h = $pdo->query("UPDATE horaires set etat=1 where heure='14h00' and id_tech='$idtech' and id_jour='$idsamedi'  ");
        $requeteUpdate = $pdo->query("UPDATE horaires set etat=0, absence='Non' where heure!='11h00' and heure!='12h00' and heure!='13h00' and heure!='14h00'  and id_tech='$idtech' and id_jour='$idsamedi'  ");
    }
    if ($astreinte == "12-16") {
        $requete7h = $pdo->query("UPDATE horaires set etat=1 where heure='12h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete8h = $pdo->query("UPDATE horaires set etat=1 where heure='13h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete9h = $pdo->query("UPDATE horaires set etat=1 where heure='14h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete10h = $pdo->query("UPDATE horaires set etat=1 where heure='15h00' and id_tech='$idtech' and id_jour='$idsamedi'  ");
        $requeteUpdate = $pdo->query("UPDATE horaires set etat=0, absence='Non' where heure!='12h00' and heure!='13h00' and heure!='14h00' and heure!='15h00'  and id_tech='$idtech' and id_jour='$idsamedi'  ");
    }
    if ($astreinte == "SamCon") {
        $requete9h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='09h00 ' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete10h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='10h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='11h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='12h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='13h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='14h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='15h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='16h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Conge',etat=0 where heure='17h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
    }
    if ($astreinte == "SamMal") {
        $requete9h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='09h00 ' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete10h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='10h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='11h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='12h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='13h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='14h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='15h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='16h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
        $requete11h = $pdo->query("UPDATE horaires set absence='Maladie',etat=0 where heure='17h00' and id_tech='$idtech' and id_jour='$idsamedi' ");
    }
    header("location:espaceTechnicien.php?id=$idtech&m=$matin&s=$soir");
}
?>
<html>

<head>
</head>

<body>
    <div class="panel panel-primary col-md-10   col-md-offset-1" style="text-align: center;margin-top:150px;">
        <div class="panel-heading">
            <b style="font-size:17px;float:left;"><?php echo $tech['nom'] . ' ' . $tech['prenom']; ?></b>
            <b style="font-size:17px;">Groupe <?php echo $groupes['nom_groupe'] .  ' - Semaine Prochaine  ' . $semaineSuiv . ' (Du: ' . $jours[0]['date'] . ' Au ' . $jours[$j_len - 1]['date'] . ')'; ?></b>
            <a href="espaceTechnicien.php?id=<?php echo $tech['id']; ?>&a=<?php echo $tech['astreinte'] == 1 ? $astreinte : ''; ?>" style="color:white;float:right;">&nbsp;<b>Retour</b></a>
        </div>
        <div class="panel-body">
            <form class="form-inline" method="POST">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Lundi-Vendredi</th>
                            <th>Samedi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="<?php echo $tech['etat'] == 1 ? 'info' : 'danger' ?>">
                            <td><b style="font-size:17px;float:left"> <?php echo 'Semaine ' . $semaineSuiv; ?></b> </td>
                            <td>
                                <select name="matins[]" multiple class="form-control">
                                    <?php for ($i = 0; $i < $j_len - 1; $i++) {
                                        $jour = $jours[$i]['jour'];
                                        $idjour = $jours[$i]['id']; ?>
                                        <option value="7-12-<?php echo $idjour; ?>"> <b><?php echo $jour; ?></b>-07h00 - 12h00 | 14h00 - 17h00</option>
                                        <option value="8-13-<?php echo $idjour; ?>"><?php echo $jour; ?>-08h00 - 13h00 | 14h00 - 17h00</option>
                                        <option value="9-14-<?php echo $idjour; ?>"><?php echo $jour; ?>-09h00 - 14h00 | 14h00 - 17h00</option>
                                        <option value="10-15-<?php echo $idjour; ?>"><?php echo $jour; ?>-10h00 - 15h00 | 14h00 - 17h00</option>
                                        <option value="MatCon-<?php echo $idjour; ?>"><?php echo $jour; ?>-Arrêt Congé</option>
                                        <option value="MatMal-<?php echo $idjour; ?>"><?php echo $jour; ?>-Arrêt Maladie</option>
                                    <?php } ?>
                                </select>
                            </td>
                            <?php if ($tech['astreinte'] == 1) { ?>
                                <td>
                                    <select name="astreinte" class="form-control">
                                        <option value="09-13" <?php if ($astreinte == "09-13") echo "selected" ?>>09h00 - 13h00</option>
                                        <option value="10-14" <?php if ($astreinte == "10-14") echo "selected" ?>>10h00 - 14h00</option>
                                        <option value="11-15" <?php if ($astreinte == "11-15") echo "selected" ?>>11h00 - 15h00</option>
                                        <option value="12-16" <?php if ($astreinte == "12-16") echo "selected" ?>>12h00 - 16h00</option>
                                        <option value="SamCon" <?php if ($astreinte == "SamCon") echo "selected" ?>>Arrêt Congé</option>
                                        <option value="SamMal" <?php if ($astreinte == "SamMal") echo "selected" ?>>Arrêt Maladie</option>
                                    </select>
                                </td>
                            <?php } else { ?>
                                <td class="info"></td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-info" name="valider">
                    <b>Valider</b>
                </button>
            </form>
            <div>
            </div>
        </div>

</body>

</html>