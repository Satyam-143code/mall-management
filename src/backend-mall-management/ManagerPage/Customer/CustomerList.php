<?php
  require 'Connection.php';
  error_reporting(E_ERROR);
  $Customers=[];
$User_Id=$_GET['User_Id'];
$sql="SELECT * FROM Customer WHERE User_Id={$User_Id}";
if($result=mysqli_query($con,$sql))
{
  $cr=0;
  while($row=mysqli_fetch_assoc($result)){
    $Customers[$cr]['Customer_Id'] = $row['Customer_Id'];
    $Customers[$cr]['Customer'] = $row['Customer'];
    $Customers[$cr]['Gender'] = $row['Gender'];
    $Customers[$cr]['Mobile'] = $row['Mobile'];
    $Customers[$cr]['Email'] = $row['Email'];
    $Customers[$cr]['Address'] = $row['Address'];
    $cr++;
  }
  // print_r($Users);
  echo json_encode($Customers);
}
  else {
      http_response_code(404);
  }


?>
