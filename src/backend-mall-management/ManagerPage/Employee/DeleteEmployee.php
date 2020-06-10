<?php
      require 'Connection.php';
      $EmployeeID=$_GET['Username'];
      // print_r($username);
     $sql ="DELETE FROM Employee WHERE Employee_Id='{$EmployeeID}' LIMIT 1";

     if(mysqli_query($con,$sql))
     {
       http_response_code(201);
     }
     else {
       http_response_code(422);

     }
?>
