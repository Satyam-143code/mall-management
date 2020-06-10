<?php
  require 'Connection.php';

  $postdata=file_get_contents("php://input");

  if(isset($postdata)&& !empty($postdata)){

    $request=json_decode($postdata);
    $User_Id=$request->User_Id;
    $Name=$request->Name;
    $Username=$request->Username;
    $Password=$request->Password;
    $Email=$request->Email;
    // print_r($Username);
    // print_r($Name);
    // print_r($Password);
    // print_r($Email);

    $sql= "UPDATE Login
    SET M_Name='{$Name}',Username='{$Username}', Password='{$Password}', Email='{$Email}'
    WHERE User_Id='{$User_Id}'
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
