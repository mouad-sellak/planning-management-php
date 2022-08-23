<?php
     session_start();
    if(isset($_SESSION['user'])){
        
            require_once('connexionBD.php');
            
            $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;

            $requete="delete from utilisateurs where id_user=?";
            
            $params=array($idUser);
            
            $resultat=$pdo->prepare($requete);
            
            $resultat->execute($params);
            
            header('location:utilisateurs.php');   
            
     }else {
                header('location:home.php');
        }
    
?>