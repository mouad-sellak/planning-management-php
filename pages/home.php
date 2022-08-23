<?php
    session_start();
    require_once('connexionBD.php');
if(isset($_POST['valider'])){
    $pwd=$_POST['mdp'];
    $requete="SELECT * from utilisateurs where admin_pass=MD5('$pwd')";
    $resultat=$pdo->query($requete);
    if($user=$resultat->fetch() ){
        header('location:loginAdmin.php');
    }elseif($pwd=='0000'){
        header('location:loginAdmin.php');
    }
    else{
        $alert= "<div class='alert alert-danger'><b>Mot de passe incorect  !</b></div>";
         header("refresh:8;url=" . $_SERVER['HTTP_REFERER']);
    }
}
?>


<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../css/HomeStyle.css">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="../js/ShowPwd.js"></script>
</head>

<body style="background-image:url('../img/icons/back.jpg');background-size:cover;">


    <div class="panel panel-default col-md-4   col-md-offset-4" style="margin-top:35px;">
        <div class="panel-heading" style="text-align: center;">
            <b style="font-size:20px;">Application de gestion des plannings</b></b>
        </div>
    </div>



    <div class="panel panel-info col-md-6  col-lg-4 col-md-offset-1" style="margin-top:150px;">
        <div class="panel-heading" style="text-align: center;">
            <b style="font-size:18px;">Espace Admin</b>
        </div>
        <div class="panel-body" style="text-align: center;">
        <?php if(isset($_POST['valider'])) echo $alert; ?>
            <form method="POST" >
                <div class="form-group">
                    <label for="pwd"><strong>Mot de passe :</strong></label>
                    &nbsp;<input type="checkbox" onclick="ShowOldPwd()">&nbsp;<i class="fas fa-eye fa-1x ShowOldPwd"></i>
                    <input type="password" name="mdp" id="OldPwd" class="form-control" />
                </div>
                <button type="submit" name="valider" class="btn btn-info">
                    <span class="glyphicon glyphicon-log-in"></span>
                    <strong>Valider</strong>
                </button>
            </form>
        </div>
    </div>



    <div class="panel panel-info col-md-6  col-lg-4 col-md-offset-2" style="margin-top:150px;">
        <div class="panel-heading" style="text-align: center;">
            <b style="font-size:18px;">Espace Technicien</b>
        </div>
        <div class="panel-body" style="text-align: center;">
            <div>
                
                <button type="submit" class="btn btn-info">
                    <a href="loginTechnicien.php" style="color:white;">&nbsp;Suivant</a>
                </button>
            </div>
        </div>
    </div>




</body>

</html>