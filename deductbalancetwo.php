<?php
include 'config.php';
include 'database.php';
$total=$_POST['totalvalue'];
$userid=$_POST['userid'];
$currentbal=$_POST['currentbalance'];

$final=$currentbal-$total;
if ($total>0) {
  // code...

$stmt=$db->prepare("update users set balance=:bal where username=:user");
 $stmt->bindParam(":user",$userid);
 $stmt->bindParam(":bal",$final);
 //$stmt->bindParam(":digit",$number);
 $run=$stmt->execute();
 if ($run) {
   echo "बेट लगा दी गयी ";
 }

}

else {
  echo "कृपया बेट लगाएं";
}








 ?>
