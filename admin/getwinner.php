<?php
include 'config.php';
include 'database.php';
$date=$_POST['date'];
$game=preg_replace('/\s+/', ' ', trim($_POST['gamename']));
//echo $game;
$gam="%".$game."%";
$number=$_POST['winning_number'];
$stmt=$db->prepare("select userid ,amount from game_data where date_t=:d AND game LIKE :g AND digit=:digit");
 $stmt->bindParam(":d",$date);
 $stmt->bindParam(":g",$gam);
 $stmt->bindParam(":digit",$number);
 $run=$stmt->execute();
 $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
 $table="<table id='example' class='table table-bordered'>
     <thead>
       <tr>
         <th>Userid</th>
         <th>Game</th>
           <th>Jodi</th>
         <th>Amount</th>
       </tr>
     </thead>
     <tbody>";
foreach ($result as $row) {

$table.="<tr>
        <td>$row[userid]</td>
        <td>$game</td>
        <td>$number</td>
          <td> $row[amount]</td>
     </tr>" ;



}

$table .="</tbody></table>";
echo $table;














 ?>
