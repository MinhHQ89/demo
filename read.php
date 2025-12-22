<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Read</title>
    </head>
    <body>
        <a href="create.php">Create New User</a>
        <h1>List of Users</h1>
        <?php
        require_once 'connect_database.php';

        $query = "SELECT * FROM users";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<a href="update.php?id=' . $row['id'] . '">Update</a> | ';
                echo '<a href="delete.php?id=' . $row['id'] . '">Delete</a> | ';
                echo $row['name'] . ' - ' . $row['email'] . "<br>";
            }
        } else {
            echo "No users found";
        }
        ?>
    </body>
</html>