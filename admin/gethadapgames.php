<?php
include 'config.php';
include 'database.php';
$date=$_POST['date'];
$stmt=$db->prepare("select distinct game from hadap_game where date_t=:d");
 $stmt->bindParam(":d",$date);
 $run=$stmt->execute();
 $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {

  echo "<option>$row[game]</option>";




}














 ?>
