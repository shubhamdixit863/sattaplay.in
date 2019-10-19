<?php
include 'config.php';
include 'database.php';
$date=$_POST['date'];
$user=$_POST['user'];
$stmt=$db->prepare("SELECT
    h.userid,
    h.game,
    h.date_t,
    h.hdigit,
    MAX(IFNULL(h.andar, htwo.andar)) AS andar,
    MAX(IFNULL(h.bahar, htwo.bahar)) AS bahar
 FROM
    hadap_game AS h
    LEFT JOIN hadap_game AS htwo ON htwo.userid = h.userid AND htwo.hdigit = h.hdigit AND htwo.game = h.game AND htwo.id <> h.id
WHERE
    h.userid = :user
    AND h.date_t=:dat
GROUP BY
    h.userid,
    h.game,
    h.date_t,
    h.hdigit; ");
 $stmt->bindParam(":user",$user);
 $stmt->bindParam(":dat",$date);
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

          <th>Andar</th>
            <th>Bahar</th>


       </tr>
     </thead>
     <tbody>
       <tr>
<td>$row[userid]</td>
<td>$row[date_t]</td>
<td>$row[game]</td>
<td>$row[hdigit]</td>
<td>$row[andar]</td>
<td>$row[bahar]</td>

       </tr>


     </tbody>
   </table>";
}



 ?>
