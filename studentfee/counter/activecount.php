<?php

    $servername="localhost";
    $uname="root";
    $pass="";
    $database="schoolfeesys";

    $conn=mysqli_connect($servername,$uname,$pass,$database);

if(!$conn){
    die("Connection Failed");
}

    $sql = "SELECT * FROM student WHERE delete_status = '0'";
    $query = $conn->query($sql);
    echo "$query->num_rows";
?>