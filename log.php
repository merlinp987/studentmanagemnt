<?php
 include('config.php');
 session_start();

 // include("test.php");
   // session_start();
    
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);

    $numRows = mysqli_num_rows($result);

        
     if($numRows  == 1){

     $_SESSION['username'] = $_POST['username'];
         header("location: index.php");
      }else {
         header("location: login.php");
      }
   }


?>