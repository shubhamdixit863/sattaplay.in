<?php
include 'config.php';
include 'database.php';
$date=$_POST['date'];
$game=preg_replace('/\s+/', ' ', trim($_POST['game']));
//echo $game;
$gam="%".$game."%";
$d=$_POST['winning_number'];

$r = array();

for ($i = 0; $i < strlen($d); $i++) {
    $r[] = substr($d, $i, 1);
}

//print_r($r);


$stmt=$db->prepare("select distinct userid ,andar from andar where date_t=:d AND game LIKE :g AND hdigit=:digit ");
 $stmt->bindParam(":d",$date);
 $stmt->bindParam(":g",$gam);
 $stmt->bindParam(":digit",$r[0]);

 $run=$stmt->execute();
 $table="<table id='beta' class='table table-bordered'>
   <thead>
     <tr>
       <th>Userid</th>
       <th>Game</th>
         <th>Harup</th>
       <th>Andar</th>
     </tr>
   </thead>
   <tbody>
";
 $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {

  $table.= "<tr>
        <td>$row[userid]</td>
        <td>$game</td>

        <td>$r[0]</td>

          <td> $row[andar]</td>

      </tr>
";



  //$i=478 ;



}
$table.="
    </tbody>
  </table>";
echo $table;




$stmts=$db->prepare("select distinct userid ,bahar from bahar where date_t=:do AND game LIKE :go AND hdigit=:digits ");
$stmts->bindParam(":do",$date);
$stmts->bindParam(":go",$gam);
$stmts->bindParam(":digits",$r[1]);

$runs=$stmts->execute();

$results=$stmts->fetchAll(PDO::FETCH_ASSOC);
$tabletwo="<table id='alpha' class='table table-bordered'>
  <thead>
    <tr>
      <th>Userid</th>
      <th>Game</th>
        <th>Harup</th>
      <th>Bahar</th>
    </tr>
  </thead>
  <tbody>";
foreach ($results as $row) {

 $tabletwo.= "


     <tr>
       <td>$row[userid]</td>
           <td>$game</td>
             <td>$r[1]</td>
                 <td> $row[bahar]</td>
     ";

 //$i=478 ;



}

$tabletwo.="</tr>
</tbody>
</table>";

echo $tabletwo;

 ?>
