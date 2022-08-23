<?php
session_start();
if (isset($_SESSION['tech'])) {
    require_once('connexionBD.php');
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $astreinte = isset($_GET['astreinte']) ? $_GET['astreinte'] : 0;
    $idgroupe = $_SESSION['tech']['id_groupe'];
    if ($astreinte == 0)
        $newAstreinte = 1;
    else
        $newAstreinte = 0;
    $requete = "UPDATE techniciens set astreinte='$newAstreinte' where id='$id'";
    $resultat = $pdo->exec($requete);
    $requete2 = "UPDATE techniciens set astreinte=0 where id_groupe='$idgroupe' and  id!='$id' ";
    $resultat2 = $pdo->exec($requete2);
    header('location:espaceTechnicien.php');
} else {
    header('location:home.php');
}
