<?php
  require 'Connection.php';

  $postdata=file_get_contents("php://input");
  if(isset($postdata)&& !empty($postdata)){
    $request=json_decode($postdata);

    $Showroom=$request->Showroom;
    $Manager=$request->Manager;
    $Gender=$request->Gender;
    $Mobile=$request->Mobile;
    $Email=$request->Email;
    $Address=$request->Address;




    $sql= "INSERT INTO Showroom
    VALUES(NULL,'{$Showroom}', '{$Manager}', '{$Gender}', {$Mobile}, '{$Email}', '{$Address}')";

    if(mysqli_query($con,$sql))
    {
      http_response_code(201);
    }
    else {
      http_response_code(422);

    }
  }


 ?>
