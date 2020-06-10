<?php
  require 'Connection.php';

  $postdata=file_get_contents("php://input");

  if(isset($postdata)&& !empty($postdata)){

    $request=json_decode($postdata);
    $Cat_Id=$request->Cat_Id;
    $Category=$request->Category;
    $Description=$request->Description;


    $sql= "UPDATE Category
    SET Category='{$Category}',Description='{$Description}'
    WHERE Cat_Id='{$Cat_Id}'
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
