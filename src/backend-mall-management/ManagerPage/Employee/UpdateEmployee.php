<?php
  require 'Connection.php';

  $postdata=file_get_contents("php://input");

  if(isset($postdata)&& !empty($postdata)){

    $request=json_decode($postdata);
    $Employee_Id=$request->Employee_Id;
    $Employee=$request->Employee;
    $Designation=$request->Designation;
    $Gender=$request->Gender;
    $Mobile=$request->Mobile;
    $Email=$request->Email;
    $Address=$request->Address;


    $sql= "UPDATE Employee
    SET Employee='{$Employee}',Designation='{$Designation}', Gender='{$Gender}', Mobile={$Mobile}, Email='{$Email}', Address='{$Address}'
    WHERE Employee_Id={$Employee_Id}
    LIMIT 1";

    if(mysqli_query($con,$sql))
    {
      http_response_code(204);
    }
    else {
      http_response_code(422);

    }
  }
 ?>
