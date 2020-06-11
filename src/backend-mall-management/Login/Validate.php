<?php
  require 'Connection.php';
  $Users=[];

  $postdata=file_get_contents("php://input");
  if(isset($postdata)&& !empty($postdata)){
    $request=json_decode($postdata);

    $Username=$request->Username;
    $Password=$request->Password;


    $sql="SELECT * FROM User WHERE Username = '{$Username}' AND Password='{$Password}' Limit 1" ;

    if($result=mysqli_query($con,$sql))
    {
      if(mysqli_num_rows($result)==1){
        $cr=0;
        $row=mysqli_fetch_assoc($result);
        $Users['User_Id'] = $row['User_Id'];
        $Users['Name'] = $row['M_Name'];
        $Users['Username'] = $row['Username'];
        $Users['Password'] = $row['Password'];
        $Users['Email'] = $row['Email'];
        // print_r($Users);
        echo json_encode($Users);
        exit();
    }
    else{
      echo null;
        exit();
    }



    }


  }
 ?>
