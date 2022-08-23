<?php
    session_start();
    require_once('connexionBD.php');
    
    $login=isset($_POST['login'])?$_POST['login']:"";
    
    $pwd=isset($_POST['mdp'])?$_POST['mdp']:"";

    $requete="select * 
                from utilisateurs where login='$login' 
                and pass=MD5('$pwd')";
    $resultat=$pdo->query($requete);
    if($user=$resultat->fetch()){
        if($user['etat']==1){
            
            $_SESSION['user']=$user;
            header('location:groupes.php');
            
        }else{
            
            $_SESSION['erreurLoginAdmin']="Votre compte est désactivé.<br> Veuillez contacter l'administrateur";
            header('location:loginAdmin.php');
        }
    }else{
        $_SESSION['erreurLoginAdmin']="<strong>Login ou mot de passe incorrect !</strong>";
        header('location:loginAdmin.php');
    }

?>
