<?php
require_once('connexionBD.php');
$auj = date("j-n-Y");
$semaineActu = date("W", strtotime($auj));
$requeteSemaineActu = $pdo->query("UPDATE semaine set num_semaine='$semaineActu' where id=1  ");
$semaineSuiv = $semaineActu + 1;
$requeteSemaineSuiv = $pdo->query("UPDATE semaine set  num_semaine='$semaineSuiv' where id=2  ");

$date=date("l")=="Monday"?strtotime("Monday"):strtotime("Last Monday");
$enddate=strtotime("+14 days", $date);
$i=1;
while ($date < $enddate) {
    $dateFormat=date("Y-m-d", $date);
    $requeteJours = $pdo->query("UPDATE jours set date='$dateFormat' where id='$i'  ");
    $date = strtotime("+1 day", $date);
    $i++;
}
header('location:espaceTechnicien.php');