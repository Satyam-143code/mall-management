<?php
  require 'Connection.php';

  $postdata=file_get_contents("php://input");

  if(isset($postdata)&& !empty($postdata)){

    $request=json_decode($postdata);

    $Showroom=$request->Showroom;
    $Showroom_Id=$request->Showroom_Id;
    $Manager=$request->Manager;
    $Gender=$request->Gender;
    $Mobile=$request->Mobile;
    $Email=$request->Email;
    $Address=$request->Address;
    print_r($Showroom);
    print_r($Manager);
    print_r($Gender);
    print_r($Mobile);
    print_r($Email);
    print_r($Address);

    $sql= "UPDATE Showroom
    SET Showroom='{$Showroom}',Manager='{$Manager}', Gender='{$Gender}', Mobile={$Mobile}, Email='{$Email}', Address='{$Address}'
    WHERE Showroom_Id='{$Showroom_Id}'
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
