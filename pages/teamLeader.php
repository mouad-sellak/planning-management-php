<?php
session_start();
if (isset($_SESSION['user'])) {
    require_once('connexionBD.php');
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $role = isset($_GET['role']) ? $_GET['role'] : "";
    $nomPrenom = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
    $idgroupe = isset($_GET['idgroupe']) ? $_GET['idgroupe'] : 0;
    $size = isset($_GET['size']) ? $_GET['size'] : 4;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if ($role == "Technicien")
        $newRole = "TeamLeader";
    else
        $newRole = "Technicien";
    $requete = "UPDATE techniciens set role='$newRole' where id='$id'";
    $resultat = $pdo->exec($requete);
    $requete2 = "UPDATE techniciens set role='Technicien' where id_groupe='$idgroupe' and  id!='$id' ";
    $resultat2 = $pdo->exec($requete2);
    header('location:techniciens.php?nomPrenom=' . $nomPrenom . '&idgroupe=' . $idgroupe . '&size=' . $size. '&page=' . $page);
} else {
    header('location:loginAdmin.php');
}
