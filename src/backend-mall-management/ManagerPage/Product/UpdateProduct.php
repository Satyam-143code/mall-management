<?php
  require 'Connection.php';

  $postdata=file_get_contents("php://input");

  if(isset($postdata)&& !empty($postdata)){

    $request=json_decode($postdata);
    $Pro_Id=$request->Product_Id;
    $Category=$request->Category;
    $Product=$request->Product;
    $Price=$request->Price;
    $Description=$request->Description;


    $sql= "UPDATE Product
    SET Product='{$Product}',Category='{$Category}',Price={$Price} ,Description='{$Description}'
    WHERE Pro_Id={$Pro_Id}
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
