<?php
      require 'Connection.php';
      $CatID=$_GET['Username'];
      // print_r($username);
     $sql ="DELETE FROM Customer WHERE Customer_Id='{$CatID}' LIMIT 1";

     if(mysqli_query($con,$sql))
     {
       http_response_code(201);
     }
     else {
       http_response_code(422);

     }
?>
