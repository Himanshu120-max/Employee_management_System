<?php
include "./config.php";

    $id = $_GET['id'];

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    // $sql_query = "UPDATE `test`.`employee` SET `name`=$name  WHERE id=$id";
    // $result = mysqli_query($conn, $sql_query);

    // Use prepared statement to prevent SQL injection
    $sql_query = "UPDATE `test`.`employee` SET `name` = ?, `phone` = ?, `email` = ?, `department` = ? WHERE `id` = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql_query);

    // Check if preparation was successful
    if ($stmt === false) {
        echo "Error preparing query: " . $conn->error;
        exit;
    }

    // Bind parameters
    $stmt->bind_param("ssssi", $name, $phone, $email, $department, $id);

    if ($stmt->execute()) {
        echo "Data Updated Successfully";
        echo "<script>location.replace('index.php');</script>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // if($result){
    //     echo "Data Updated Successfully";
    //     echo "<script>location.replace('index.php')</script>";
    // }
    // else{
    //     echo $conn->error;
    // }
?>