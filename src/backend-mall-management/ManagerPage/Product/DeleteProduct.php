<?php
      require 'Connection.php';
      $ProID=$_GET['Username'];
      // print_r($username);
     $sql ="DELETE FROM Product WHERE Pro_Id='{$ProID}' LIMIT 1";

     if(mysqli_query($con,$sql))
     {
       http_response_code(201);
     }
     else {
       http_response_code(422);

     }
?>
