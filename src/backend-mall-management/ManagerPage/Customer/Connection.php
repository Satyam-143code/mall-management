<?php
    define('server','localhost');
    define('username','root');
    define('password','');
    define('database','Mall-Management');
    // Create connection
    function connect(){
      $connection= mysqli_connect(server, username, password,database);
      // Check connection
      if (mysqli_connect_errno($connection)){
        die("Failed to connect".mysqli_connect_errno());
      }
      mysqli_set_charset($connection,'utf8');
      return $connection;
  }
  $con=connect();

 ?>
