<?php

session_start();

include "../config/db.php";


$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $user = mysqli_fetch_assoc($result);

    if(password_verify($password, $user['password'])){

        $_SESSION['user_id'] = $user['user_id'];

        $_SESSION['fullname'] = $user['fullname'];

        $_SESSION['email'] = $user['email'];

        $_SESSION['photo'] = $user['photo'];

        $_SESSION['role'] = $user['role'];


        if($user['role'] == "Admin"){

            header("Location: ../admin/dashboard.php");

        }

        else{

            header("Location: ../student/dashboard.php");

        }

        exit();

    }

    else{

        echo "<script> alert('Incorrect Password!');
        
        window.location='login.php';

        </script>";
    }

}

else{

    echo "<script>alert('Email not found!');

    window.location='login.php';

    </script>

    ";

}

?>