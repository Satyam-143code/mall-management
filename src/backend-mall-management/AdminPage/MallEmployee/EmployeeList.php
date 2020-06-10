<?php
  require 'Connection.php';
  error_reporting(E_ERROR);
  $Employees=[];
  $sql="SELECT * FROM MallEmployee";
  if($result=mysqli_query($con,$sql))
  {
    $cr=0;
    while($row=mysqli_fetch_assoc($result)){
      $Employees[$cr]['Employee_Id'] = $row['Employee_Id'];
      $Employees[$cr]['Employee'] = $row['Employee'];
      $Employees[$cr]['Designation'] = $row['Designation'];
      $Employees[$cr]['Gender'] = $row['Gender'];
      $Employees[$cr]['Mobile'] = $row['Mobile'];
      $Employees[$cr]['Email'] = $row['Email'];
      $Employees[$cr]['Address'] = $row['Address'];
      $cr++;
    }
    // print_r($Employees);
    echo json_encode($Employees);
  }
  else {
      http_response_code(404);
  }


?>
