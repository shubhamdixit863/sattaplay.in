<?php
session_start();
include 'config.php';
include 'database.php';
$stmt=$db->prepare("SELECT  `userid`, `amount`, `date_t`, `game` FROM `winners`  WHERE userid=:user");
$stmt->bindParam(":user",$_SESSION['username']);
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
