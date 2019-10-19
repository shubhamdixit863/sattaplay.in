<?php
include 'config.php';
include 'database.php';
$date=$_POST['date'];
$user=$_POST['user'];
$stmt=$db->prepare("SELECT * FROM `game_data` WHERE date_t=:dat  AND userid=:user");
 $stmt->bindParam(":dat",$date);
 $stmt->bindParam(":user",$user);
 $run=$stmt->execute();
 $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {

  echo "<table class='table table-bordered'>
     <thead>
       <tr>
         <th>Username</th>
         <th>Dates</th>
         <th>Game</th>
          <th>Digit</th>

          <th>Amount invested</th>

       </tr>
     </thead>
     <tbody>
       <tr>
<td>$row[userid]</td>
<td>$row[date_t]</td>
<td>$row[game]</td>
<td>$row[digit]</td>
<td>$row[amount]</td>

       </tr>


     </tbody>
   </table>";
}

 ?>
