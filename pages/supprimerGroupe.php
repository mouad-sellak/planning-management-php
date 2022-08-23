<?php
        session_start();
        if(isset($_SESSION['user']) ){
            
                require_once('connexionBD.php');
                
                $id=isset($_GET['idg'])?$_GET['idg']:0;

                $requete="delete from groupes where id=?";
                
                $params=array($id);
                  
                $resultat=$pdo->prepare($requete);
                
                $resultat->execute($params);
                
                header('location:groupes.php'); 
                
            }
        else {
                header('location:home.php');
        }
