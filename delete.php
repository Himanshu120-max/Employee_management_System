<?php
include "./config.php";

    $id = $_GET['id'];

    $sql_query = "DELETE FROM `test`.`employee` WHERE `employee`.`id` = $id";

    $result = mysqli_query($conn, $sql_query);

    if($result){
        echo "Data Deleted Successfully";
        echo "<script>location.replace('index.php')</script>";
    }
    else{
        echo $conn->error;
    }
?>