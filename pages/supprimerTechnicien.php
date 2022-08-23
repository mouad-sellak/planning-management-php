<?php
        session_start();
        if(isset($_SESSION['user']) ){
            
                require_once('connexionBD.php');
                
                $id=isset($_GET['idT'])?$_GET['idT']:0;

                $requete="delete from techniciens where id=?";
                
                $params=array($id);
                  
                $resultat=$pdo->prepare($requete);
                
                $resultat->execute($params);
                
                header('location:techniciens.php'); 
                
            }
        else {
                header('location:home.php');
        }
