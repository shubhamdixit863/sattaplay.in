<?php
include 'config.php';
include 'database.php';
session_start();

$username=$_POST['username'];
$password=$_POST['password'];

$stmt=$db->prepare("select password from users where username=:user");
 $stmt->bindParam(":user",$username);
 $run=$stmt->execute();
 $result=$stmt->fetch(PDO::FETCH_ASSOC);

if ($result["password"]==$password) {
  date_default_timezone_set('Asia/Kolkata');
  $cudate= date('Y-m-d H:i:s');
  $stmt=$db->prepare("update users set lastlogin=:date  where username=:user");
   $stmt->bindParam(":user",$username);
   $stmt->bindParam(":date",$cudate);
   $run=$stmt->execute();
   if ($run) {
     // code...

  echo "success";

 $_SESSION['username']=$username;
}
 //header('Location:playpage.php');

}

else {
 echo "Wrong username or password";

}









 ?>
