<?php
  require 'Connection.php';
  error_reporting(E_ERROR);
  $Users=[];
  $sql="SELECT * FROM Login";
  if($result=mysqli_query($con,$sql))
  {
    $cr=0;
    while($row=mysqli_fetch_assoc($result)){
      $Users[$cr]['User_Id'] = $row['User_Id'];
      $Users[$cr]['Name'] = $row['M_Name'];
      $Users[$cr]['Username'] = $row['Username'];
      $Users[$cr]['Password'] = $row['Password'];
      $Users[$cr]['Email'] = $row['Email'];
      $cr++;
    }
    // print_r($Users);
    echo json_encode($Users);
  }
  else {
      http_response_code(404);
  }


?>
