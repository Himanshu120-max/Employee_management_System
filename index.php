<?php
  include "./config.php";

  $sql_query = "SELECT * FROM `test`.`employee`";

  $result = mysqli_query($conn, $sql_query);

  // Check for errors during database query execution
  if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP CRUD - Employee Management</title>
  <link rel="stylesheet" href="style.css"> </head>

  <style>
    /* Style the container for a cleaner layout */
    .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 20px auto;
    width: 80%;
    max-width: 1000px;
    }

    /* Style the table for better readability */
    table {
    border-collapse: collapse;
    width: 100%;
    }
    th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
    }
    th {
    background-color: #f2f2f2;
    font-weight: bold;
    }

    /* Style the header for a more professional look */
    h1 {
    font-size: 24px;
    margin-bottom: 20px;
    }

    /* Style the action links for clarity */
    .action-link {
    color: #007bff;
    text-decoration: none;
    margin-right: 10px;
    }

    .confirm-delete {
    color: #dc3545;
    }

    /* Add hover effects for interactivity (optional) */
    .action-link:hover {
    opacity: 0.8;
    }

    .button-container {
    display: flex;
    justify-content: flex-end; /* Align items to the right */
    margin-bottom: 20px; /* Add margin for spacing */
    max-width: 1000px;
}

.add-button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    font-size: 16px; /* Optional: adjust button font size */
}

.add-button:hover {
    background-color: #0056b3; /* Optional: add a hover effect */
}

  </style>
<body>
  <div>
    <div class="container">
        <h1>Employee Management System</h1>
    </div>
    <div class="button-container">
        <div>
            <a href="create.php" class="add-button">Add New Employee</a>
        </div>
    </div>

    <div class="container">
    <table>
      <thead>
        <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Department</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['department'] ?></td>
            <td>
                <div style="display:flex;">
                    <div>
                        <a href="update.php?id=<?= $row['id'] ?>" class="action-link">Update</a>
                    </div>
                    <div>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="action-link confirm-delete">Delete</a>
                    </div>
                </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <div>
  </div>
</body>
</html>