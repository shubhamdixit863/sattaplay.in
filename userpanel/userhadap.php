<?php
session_start();
include 'config.php';
include 'database.php';
$stmt=$db->prepare("select (@rn := @rn + 1) as id, userid, date_t, game, hdigit,
       max(andar) as andar, max(bahar) as bahar
from ((select userid, date_t, game, hdigit, andar, null as bahar
       from andar where userid=:user_one
      ) union all
      (select userid, date_t, game, hdigit, null, bahar
       from bahar where userid=:user_two
      )
     ) t cross join
     (select @rn := 0) params
group by userid, date_t, game, hdigit");
$stmt->bindParam(":user_one",$_SESSION['username']);
$stmt->bindParam(":user_two",$_SESSION['username']);
 //$stmt->bindParam(":g",$gam);
 //$stmt->bindParam(":digit",$number);
 $run=$stmt->execute();
 $result=$stmt->fetchAll(PDO::FETCH_ASSOC);




$results = array(
			"sEcho" => 1,
        "iTotalRecords" => count($result),
        "iTotalDisplayRecords" => count($result),
          "aaData"=>$result);
/*while($row = $result->fetch_array(MYSQLI_ASSOC)){
  $results["data"][] = $row ;
}*/

echo json_encode($results);







 ?>
