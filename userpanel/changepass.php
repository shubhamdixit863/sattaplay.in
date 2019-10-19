<?php
include 'config.php';
include 'database.php';

if ($_POST['old']=="") {
  echo "Please enter Password";
}

else {
  $old=$_POST['old'];
  $user=$_POST['user'];
  $stmt=$db->prepare("update users set password=:p  where username=:a");
   $stmt->bindParam(":a",$user);
    $stmt->bindParam(":p",$old);
   $run=$stmt->execute();
   if ($run) {
     echo "Password Updated";
   }

}








 ?>
