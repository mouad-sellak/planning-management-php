<?php
session_start();
require_once("menu.php");
require_once("connexionBD.php");
if (!isset($_SESSION['user'])) {
    header('location:home.php');
    exit();
} else {
    if ($_SESSION['user']['role'] != 'Admin') {
        header('location:deconnexion.php');
        exit();
    }
}
$id = $_SESSION['user']['id_region'];
$requete = "SELECT * from region where id='$id' ";
$Resultat = $pdo->query($requete);
$Tab = $Resultat->fetch();
$login = isset($_GET['login']) ? $_GET['login'] : "";
$size = isset($_GET['size']) ? $_GET['size'] : 4;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $size;
$requeteUser = "select * from utilisateurs where login like '%$login%'";
$requeteCount = "select count(*) countUser from utilisateurs where login like '%$login%' ";
$resultatUser = $pdo->query($requeteUser);
$resultatCount = $pdo->query($requeteCount);
$tabCount = $resultatCount->fetch();
$nbrUser = $tabCount['countUser'];
$reste = $nbrUser % $size;
if ($reste === 0)
    $nbrPage = $nbrUser / $size;
else
    $nbrPage = floor($nbrUser / $size) + 1;
?>
<! DOCTYPE HTML>
    <HTML>

    <head>
        <meta charset="utf-8">
        <title>Gestion des utilisateurs</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>

    <body>
        <div class="container">
            <div class="panel panel-info col-md-6   col-md-offset-3 " style="margin-top:80px;text-align: center;">
                <div class="panel-heading"> <b style="font-size:17px;">Gestion des utilisateurs</b> </div>
                <div class="panel-body">
                    <form method="get" action="utilisateurs.php" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="login" placeholder=" Chercher par login" class="form-control" value="<?php echo $login ?>" />
                        </div>
                        <button type="submit" class="btn btn-info">
                            <span class="glyphicon glyphicon-search"></span>
                        </button> &nbsp;&nbsp;
                        <span style="color:cornflowerblue; ">
                            Montrer
                            <select name="size" style="color:black;" onchange="this.form.submit()">
                                <option value="4" <?php if ($size == 4) echo "selected" ?>>4</option>
                                <option value="8" <?php if ($size == 8) echo "selected" ?>>8</option>
                                <option value="16" <?php if ($size == 16) echo "selected" ?>>16</option>
                                <option value="25" <?php if ($size == 25) echo "selected" ?>>25</option>
                            </select>
                            unité
                        </span>
                    </form>
                </div>
            </div>

            <div class="panel panel-primary col-md-10   col-md-offset-1" style="text-align: center;">
                <div class="panel-heading"><b style="font-size:17px;">Liste des utilisateurs (<?php echo $nbrUser ?> utilisateurs)</b></div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>login</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($user = $resultatUser->fetch()) { ?>
                                <tr class="<?php echo $user['etat'] == 1 ? 'info' : 'danger' ?>">
                                    <td><?php echo $user['login'] ?> </td>
                                    <td><?php echo $user['email'] ?> </td>
                                    <td><?php echo $user['role'] ?> </td>
                                    <td>
                                        <a  title="Editer utilisateur" href="modifierUtilisateur.php?id=<?php echo $user['id_user'] ?>&region=<?php echo $Tab['nom_region']; ?>&img=<?php echo $_SESSION['user']['image']; ?>">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a  title="Supprimer utilisateur" onclick="return confirm('Etes vous sur de vouloir supprimer cet utilisateur')" href="supprimerUtilisateur.php?idUser=<?php echo $user['id_user'] ?>">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a title="Activer utilisateur" href="activerUtilisateur.php?id=<?php echo $user['id_user'] ?>&etat=<?php echo $user['etat']  ?>">
                                            <?php
                                            if ($user['etat'] == 1)
                                                echo '<span class="glyphicon glyphicon-remove"></span>';
                                            else
                                                echo '<span class="glyphicon glyphicon-ok"></span>';
                                            ?>
                                        </a>
                                        &nbsp;
                                        <a href="groupesVisibles.php?id=<?php echo $user['id_user'] ?>">
                                            <?php
                                                echo '<img src="../img/icons/groupe-visible.png" title="Groupes visibles" with="16px" height="16px" style="margin-top:-5px">';
                                            ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div>
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $nbrPage; $i++) { ?>
                                <li class="<?php if ($i == $page) echo 'active' ?>">
                                    <a href="utilisateurs.php?page=<?php echo $i; ?>&login=<?php echo $login ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </HTML>