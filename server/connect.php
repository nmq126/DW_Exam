<?php


function connectToServer(){
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student_feedback";
    $cnn = new mysqli($server_name, $username, $password, $dbname);
    if ($cnn->connect_error) {
        die("Connection failed:" . $cnn->connect_error);
    }
    return $cnn;
}


?>
