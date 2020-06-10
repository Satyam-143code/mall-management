<?php
  require 'Connection.php';

  $postdata=file_get_contents("php://input");
  if(isset($postdata)&& !empty($postdata)){
    $request=json_decode($postdata);

    $Customer=$request->Customer;
    $Gender=$request->Gender;
    $Mobile=$request->Mobile;
    $Email=$request->Email;
    $Address=$request->Address;
    $User_Id=$request->User_Id;





    $sql= "INSERT INTO Customer
    VALUES(NULL,{$User_Id},'{$Customer}', '{$Gender}', {$Mobile}, '{$Email}', '{$Address}')";

    if(mysqli_query($con,$sql))
    {
      http_response_code(201);
    }
    else {
      http_response_code(422);

    }
  }


 ?>
