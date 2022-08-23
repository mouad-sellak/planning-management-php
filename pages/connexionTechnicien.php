<?php
//require_once("loginTechnicien.php");
session_start();
require_once('connexionBD.php');
if (isset($_POST['valider'])) {
    $login = isset($_POST['login']) ? $_POST['login'] : "";
    $pwd = isset($_POST['mdp']) ? $_POST['mdp'] : "";
    $requete = "select * 
                from techniciens where login_tech='$login' 
                and pwd_tech=MD5('$pwd')";
    $resultat = $pdo->query($requete);
    if ($tech = $resultat->fetch()) {
        if ($tech['etat'] == 1) {
            $_SESSION['tech'] = $tech;
            header('location:espaceTechnicien.php');
        } else {
            $_SESSION['LoginSuccess'] = "<b>Connexion avec succès ! </b> <br> <b> Attendez l'activation de votre compte ! </b>";
            header("location:" . $_SERVER['HTTP_REFERER']);
        }
    } else {
        $_SESSION['erreurLoginTech'] = "<strong>Login ou mot de passe incorrect !</strong>";
        header('location:loginTechnicien.php');
    }
}
