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
    // print_r($Employee);
    // print_r($Designation);
    // print_r($Gender);
    // print_r($Mobile);
    // print_r($Email);
    // print_r($Address);

    $sql= "UPDATE MallEmployee
    SET Designation='{$Designation}', Gender='{$Gender}', Mobile={$Mobile}, Email='{$Email}', Address='{$Address}'
    WHERE Employee_Id='{$Employee_Id}'
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
