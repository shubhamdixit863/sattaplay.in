<?php
try{$db=new PDO("mysql:host=$server;dbname=$dbname",$user,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//echo "database connected";

 }
catch(PDOException $e){
  echo "Error:".$e->getMessage();
}

 ?>
