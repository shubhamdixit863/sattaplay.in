<?php


$ifsc=$_POST['ifsc'];

$json = file_get_contents('https://ifsc.razorpay.com/'.$ifsc);
$array = json_decode(stripslashes($json),true);

echo"<table class='table table-bordered'>
    <thead>
      <tr>
        <th>STATE</th>
        <th>BRANCH</th>
        <th>ADDRESS</th>
          <th>BANK</th>
        <th>IFSC</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>$array[STATE]</td>
        <td>$array[BRANCH]</td>
          <td>$array[ADDRESS]</td>
            <td>$array[BANK]</td>
            <td>$array[IFSC]</td>
      </tr>
    </tbody>
  </table>"


//$array["STATE"];





 ?>
