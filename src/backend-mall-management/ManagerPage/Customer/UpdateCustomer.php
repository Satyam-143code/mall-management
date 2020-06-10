<?php
  require 'Connection.php';

  $postdata=file_get_contents("php://input");

  if(isset($postdata)&& !empty($postdata)){

    $request=json_decode($postdata);
    $Customer_Id=$request->Customer_Id;
    $Customer=$request->Customer;
    $Gender=$request->Gender;
    $Mobile=$request->Mobile;
    $Email=$request->Email;
    $Address=$request->Address;


    $sql= "UPDATE Customer
    SET Customer='{$Customer}', Gender='{$Gender}', Mobile={$Mobile}, Email='{$Email}', Address='{$Address}'
    WHERE Customer_Id={$Customer_Id}
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
