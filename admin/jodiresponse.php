<?php
include 'config.php';
include 'database.php';
$stmt=$db->prepare("SELECT  `date_t`, `userid`, `game`, `digit`, `amount`,bet_place_time FROM `game_data` WHERE 1");
 //$stmt->bindParam(":d",$date);
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
