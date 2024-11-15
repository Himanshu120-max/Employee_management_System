<?php
include "./config.php";

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql_query = "INSERT INTO `test`.`employee` (`name`, `phone`, `email`, `department`) 
                VALUES ('$name', '$phone', '$email', '$department');";

    $result = mysqli_query($conn, $sql_query);

    if($result){
        echo "Data inserted Successfully";
        echo "<script>location.replace('index.php')</script>";
    }
    else{
        echo $conn->error;
    }
?>
