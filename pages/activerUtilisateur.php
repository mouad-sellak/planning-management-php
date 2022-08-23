<?php
session_start();
if (isset($_SESSION['user'])) {
    require_once('connexionBD.php');
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $etat = isset($_GET['etat']) ? $_GET['etat'] : 0;
    if ($etat == 1)
        $newEtat = 0;
    else
        $newEtat = 1;
    $requete = "update utilisateurs set etat=? where id_user=?";
    $params = array($newEtat, $id);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);
    header("Location:utilisateurs.php" );
} else {
    header('location:loginAdmin.php');
}
