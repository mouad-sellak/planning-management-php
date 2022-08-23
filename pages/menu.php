<?php
include("securite.php");
include("connexionBD.php");
?>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="icon" type="image/png" sizes="18x18" href="../img/icons/planning-icon.png">
  <title>Gestion des plannings</title>
</head>

<body style="background-image:url('../img/icons/back.jpg');background-size:cover;">
  <nav class="navbar navbar-inverse navbar-fixed-top" </nav>
    <div class="container-fluid">
      <ul class="nav navbar-nav navbar-left">
        <li>
          <?php if (isset($_SESSION['user'])) { ?>
            <a href="groupes.php" onmouseover="this.style.backgroundColor ='cornflowerblue'" onmouseout="this.style.backgroundColor ='#222'">
              <img src="../img/icons/planning-logo.png" alt="grp" with="24px" height="24px">
               <span style="color:white;font-size:18px; margin-top:10px;"> Gestion des plannings</span>
            </a>
          <?php } ?>
          <?php if (isset($_SESSION['tech'])) { ?>
            <a href="espaceTechnicien.php" onmouseover="this.style.backgroundColor ='cornflowerblue'" onmouseout="this.style.backgroundColor ='#222'">
              <img src="../img/icons/planning-logo.png" alt="grp" with="24px" height="24px">
               <span style="color:white;font-size:18px; margin-top:10px;"> Gestion des plannings</span>
            </a>
          <?php } ?>
        </li>
        <li>
          <?php if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == "Admin") { ?>
              <a href="groupes.php" onmouseover="this.style.backgroundColor ='cornflowerblue'" onmouseout="this.style.backgroundColor ='#222'">
                <img src="../img/icons/group.png" alt="grp" with="24px" height="24px">
                 <span style="color:white;font-size:16px;">Groupes</span>
              </a>
          <?php }
          } ?>
        </li>
        <li>
          <?php if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == "Admin") { ?>
              <a href="techniciens.php" onmouseover="this.style.backgroundColor ='cornflowerblue'" onmouseout="this.style.backgroundColor ='#222'">
                <img src="../img/icons/technician.png" alt="grp" with="24px" height="24px">
                 <span style="color:white;font-size:16px;">Techniciens</span>
              </a>
          <?php }
          } ?>
        </li>
        <li>
          <?php if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == "Admin") { ?>
              <a href="utilisateurs.php" onmouseover="this.style.backgroundColor ='cornflowerblue'" onmouseout="this.style.backgroundColor ='#222'">
                <img src="../img/icons/respo.png" alt="grp" with="24px" height="24px">
                 <span style="color:white;font-size:16px;">Responsables</span>
              </a>
          <?php }
          } ?>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <?php if (isset($_SESSION['user'])) {
            $id = $_SESSION['user']['id_region'];
            $requete = "SELECT * from region where id='$id' ";
            $Resultat = $pdo->query($requete);
            $Tab = $Resultat->fetch();
          ?>
            <a href="modifierProfilAdmin.php?id=<?php echo $_SESSION['user']['id_user']; ?>&region=<?php echo $Tab['nom_region']; ?>&img=<?php echo $_SESSION['user']['image']; ?>" style="margin-top:-6px;" onmouseover="this.style.backgroundColor ='cornflowerblue'" onmouseout="this.style.backgroundColor ='#222'">
               <span style="color:white;font-size:16px;">
                <img src="../img/utilisateurs/<?php echo $_SESSION['user']['image'];  ?>" class="img-circle" alt="Admin" width="33px" height="33px">
                <?php echo  ' ' . $_SESSION['user']['login'] ?>
                <b style="font-size:10"><?php echo  $Tab['nom_region']; ?></b>
            </a>
          <?php } ?>

          <?php if (isset($_SESSION['tech'])) { ?>
            <a href="modifierProfilTech.php?id=<?php echo $_SESSION['tech']['id']; ?>" onmouseover="this.style.backgroundColor ='cornflowerblue'" onmouseout="this.style.backgroundColor ='#222'">
               <span style="color:white;font-size:16px;">
                <img src="../img/icons/technician.png" alt="grp" with="24px" height="24px">
                <?php echo  ' ' . $_SESSION['tech']['login_tech'] ?>
              </span>
            </a>
          <?php } ?>
        </li>
        <li>
          <a href="Deconnexion.php" onmouseover="this.style.backgroundColor ='cornflowerblue'" onmouseout="this.style.backgroundColor ='#222'">
            <img src="../img/icons/logout.png" alt="grp" with="24px" height="24px">
            <span style="color:white;font-size:16px;">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</body>

</html>