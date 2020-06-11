<?php
  require 'Connection.php';

  $postdata=file_get_contents("php://input");
  if(isset($postdata)&& !empty($postdata)){
    $request=json_decode($postdata);

    $Name=$request->MName;
    $Username=$request->username;
    $Password=$request->password;
    $Email=$request->Email;

    $sql= "INSERT INTO User
    VALUES(NULL, '{$Username}', '{$Password}','{$Name}', '{$Email}')";

    if(mysqli_query($con,$sql))
    {
      http_response_code(201);
    }
    else {
      http_response_code(422);

    }
  }


 ?>
