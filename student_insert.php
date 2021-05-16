<?php
include('config.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($db,$_POST['name']);
      $department = mysqli_real_escape_string($db,$_POST['department']); 
       $semester = mysqli_real_escape_string($db,$_POST['semester']);
      $dob = mysqli_real_escape_string($db,$_POST['dob']); 
       $university_number = mysqli_real_escape_string($db,$_POST['university_number']);
      $email = mysqli_real_escape_string($db,$_POST['email']); 
       $phone_number = mysqli_real_escape_string($db,$_POST['phone_number']);
      $address = mysqli_real_escape_string($db,$_POST['address']); 
echo 


$sql = "INSERT INTO student_data   (name, department, semester,dob,university_number,email,phone_number,address)
VALUES ('$name', '$department','$semester','$dob','$university_number','$email','$phone_number','$address')";
 $result = mysqli_query($db,$sql);
   header("location: add-student.php");
    
}

?>