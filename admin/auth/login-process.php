<?php
require('../config/config.php');
// start the session
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "" || $password == "") {
        header('location:../index.php?required=All Fields are Required');
    } else {
        // fetch the email and password from users table
        $select = "SELECT *FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $select);
        // check if the email and password is correct
        if ($result->num_rows > 0) {

            // get the user data
            $row = $result->fetch_assoc();
            // $row = mysqli_fetch_asoc($result);

            // set the session
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            header('location:../dashboard.php?success=Login Successfully');
        } else {
            header('location:../index.php?error=Invalid Email or Password');
        }
    }
}
