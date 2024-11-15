<?php
    include "./config.php";

    $id = $_GET['id'];

    $sql_query = "SELECT * FROM `test`.`employee` WHERE id=$id";

    $result = mysqli_query($conn, $sql_query);

    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 60px;
            padding-top: 30px;
            padding-bottom: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            width: 400px;
            margin: 0 auto;
        }

        .input {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="formUpdate.php?id=<?= $id ?>" method="POST">
        <div class="input">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" value="<?= $row['name'] ?>">
        </div>
        <div class="input">
            <label for="phone">Phone No.</label>
            <input type="number" id="phone" name="phone" placeholder="Enter your number" value="<?= $row['phone'] ?>">
        </div>
        <div class="input">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?= $row['email'] ?>">
        </div>
        <div class="input">
            <label for="department">Department</label>
            <input type="text" id="department" name="department" placeholder="Enter your department" value="<?= $row['department'] ?>">
        </div>
        <input type="submit" value="Update">
    </form>
</body>
</html>