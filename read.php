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
        
        try {
            $query = "SELECT * FROM users";
            $result = $conn->query($query);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);

            if (count($rows) > 0) {
                foreach ($rows as $row) {
                    echo '<a href="update.php?id=' . $row['id'] . '">Update</a> | ';
                    echo '<a href="delete.php?id=' . $row['id'] . '">Delete</a> | ';
                    echo $row['name'] . ' - ' . $row['email'] . "<br>";
                }
            } else {
                echo "No users found";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </body>
</html>