<?php
      require 'Connection.php';
      $username=$_GET['Username'];
      // print_r($username);
     $sql ="DELETE FROM Login WHERE User_Id='{$username}' LIMIT 1";

     if(mysqli_query($con,$sql))
     {
       http_response_code(201);
     }
     else {
       http_response_code(422);

     }
?>
