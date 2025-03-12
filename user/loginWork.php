<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);

include("../connection.php");

// echo $username = $_POST['username'];
// echo $password = $_POST['password'];

if (!isset($_POST['username'], $_POST['password'])) {

echo "Invlid";

}

else{

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "select username ,email , password from admindata where username='$username' or email='$username';";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) == 1) {
        // $row = mysqli_fetch_assoc(s$res);

        $row = mysqli_fetch_array($res);

        // $verify = password_verify($row['password'],$password);

        // if ($verify) {

        // if (password_verify($password, $row['password'])) {
            if ($_POST['password'] === $password) {
           
                $_SESSION["login_sess"] = 1;
                $_SESSION["login_email"] = $row['email'];
                header('Location:../Dashboard/dashboard.php');
          
 
        } else {

            $_SESSION['error'] = "Invalid Password";
            header("location:login.php");
           
        }
    } else {
        $_SESSION['error'] = "User Not Found";
        header("location:login.php");
    }

}


   
