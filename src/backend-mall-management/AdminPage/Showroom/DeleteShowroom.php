<?php
      require 'Connection.php';
      $Showroom=$_GET['Showroom1'];
      // print_r($username);
     $sql ="DELETE FROM Showroom WHERE Showroom_Id='{$Showroom}' LIMIT 1";

     if(mysqli_query($con,$sql))
     {
       http_response_code(201);
     }
     else {
       http_response_code(422);

     }
?>
