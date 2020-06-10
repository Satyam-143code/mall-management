<?php
      require 'Connection.php';
      $Employee=$_GET['Employee1'];
      // print_r($username);
     $sql ="DELETE FROM MallEmployee WHERE Employee_Id='{$Employee}' LIMIT 1";

     if(mysqli_query($con,$sql))
     {
       http_response_code(201);
     }
     else {
       http_response_code(422);

     }
?>
