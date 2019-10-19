<?php
include 'config.php';
include 'database.php';
$date=$_POST['date'];
//$game=$_POST['gamename'];
//$number=$_POST['winning_number'];
$stmt=$db->prepare("SELECT  `userid`, `game`, `date_t`, `hdigit`, `andar`, `bahar` FROM `hadap_game` WHERE date_t=:d");
 $stmt->bindParam(":d",$date);
 //$stmt->bindParam(":g",$game);
 //$stmt->bindParam(":digit",$number);
 $run=$stmt->execute();
 $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {

  echo " <table class='table table-bordered'>
    <thead>
      <tr>
        <th>Userid</th>
        <th>Game</th>
          <th>Digit</th>
        <th>Amount Andar</th>
        <th>Amount Bahar</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>$row[userid]</td>
        <td>$row[game]</td>
        <td>$row[hdigit]</td>
          <td>Rs $row[andar]</td>
          <td>$row[bahar]</td>
      </tr>
    </tbody>
  </table>";




}














 ?>
