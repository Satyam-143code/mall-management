<?php
  require 'Connection.php';
  error_reporting(E_ERROR);
  $Showrooms=[];
  $sql="SELECT * FROM Showroom";
  if($result=mysqli_query($con,$sql))
  {
    $cr=0;
    while($row=mysqli_fetch_assoc($result)){
      $Showrooms[$cr]['Showroom_Id'] = $row['Showroom_Id'];
      $Showrooms[$cr]['Showroom'] = $row['Showroom'];
      $Showrooms[$cr]['Manager'] = $row['Manager'];
      $Showrooms[$cr]['Gender'] = $row['Gender'];
      $Showrooms[$cr]['Mobile'] = $row['Mobile'];
      $Showrooms[$cr]['Email'] = $row['Email'];
      $Showrooms[$cr]['Address'] = $row['Address'];
      $cr++;
    }
    // print_r($Showrooms);
    echo json_encode($Showrooms);
  }
  else {
      http_response_code(404);
  }


?>
