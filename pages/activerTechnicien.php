<?php
session_start();
if (isset($_SESSION['user'])) {
    require_once('connexionBD.php');
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $etat = isset($_GET['etat']) ? $_GET['etat'] : 0;
    $nomPrenom = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
    $idgroupe = isset($_GET['idgroupe']) ? $_GET['idgroupe'] : 0;
    $size = isset($_GET['size']) ? $_GET['size'] : 4;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if ($etat == 1)
        $newEtat = 0;
    else
        $newEtat = 1;
    $requete = "update techniciens set etat=? where id=?";
    $params = array($newEtat, $id);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);
    header('location:techniciens.php?nomPrenom=' . $nomPrenom . '&idgroupe=' . $idgroupe . '&size=' . $size. '&page=' . $page);
} else {
    header('location:loginAdmin.php');
}
