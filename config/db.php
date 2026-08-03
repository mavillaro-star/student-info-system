<?php

    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "student_information_system";

    $conn = mysqli_connect("127.0.0.1","root","","student_information_system",3308);


    if(!$conn){

        die("Database Connection Failed! " . mysqli_connect_error());

    }
?>