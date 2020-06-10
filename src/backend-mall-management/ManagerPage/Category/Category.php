<?php
  require 'Connection.php';

  $postdata=file_get_contents("php://input");
  if(isset($postdata)&& !empty($postdata)){
    $request=json_decode($postdata);

    $Category=$request->Category;
    $Description=$request->Description;
    $User_Id=$request->User_Id;


    $sql= "INSERT INTO Category
    VALUES(NULL,{$User_Id}, '{$Category}',  '{$Description}')";

    if(mysqli_query($con,$sql))
    {
      http_response_code(201);
    }
    else {
      http_response_code(422);

    }
  }


 ?>
