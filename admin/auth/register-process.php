<?php
require('../config/config.php');

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

   if($name!="" && $username!="" && $phone!="" && $email!="" && $password!=""){
      
    $select="SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result =mysqli_query($conn, $select);
    if($result->num_rows > 0){
        header('location:../register.php?exist=Username OR Email is already exist');
    }
    else{
        $insert = "INSERT INTO users (name,username, phone, email, password) VALUES ('$name', '$username','$phone', '$email', '$password')";
        $result = mysqli_query($conn, $insert);
        if($result){
            header('location:../index.php?msg=Data Inserted Successfully');
        }
        else{
            header('location:../register.php?error=Data is not Inserted Successfully');
        }
    }
   }
   else{
    header('location:../register.php?required=Below Fields are Required');
   }
}

?>