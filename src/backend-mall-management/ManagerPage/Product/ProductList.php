<?php
  require 'Connection.php';
  error_reporting(E_ERROR);
  $Info=[];
  $User_Id=$_GET['User_Id'];
  $sql="SELECT * FROM Product WHERE User_Id={$User_Id}";
  if($result=mysqli_query($con,$sql))
  {
    $cr=0;
    while($row=mysqli_fetch_assoc($result)){
      $Info[$cr]['Product_Id'] = $row['Pro_Id'];
      $Info[$cr]['Product'] = $row['Product'];
      $Info[$cr]['Category'] = $row['Category'];
      $Info[$cr]['Price'] = $row['Price'];
      $Info[$cr]['Description'] = $row['Description'];
      $cr++;
    }
    // print_r($Users);
    echo json_encode($Info);
  }
  else {
      http_response_code(404);
  }


?>
