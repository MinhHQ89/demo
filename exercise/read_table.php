<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Read Table</title>
        <link rel="stylesheet" href="table.css">
    </head>
    <body>
        <a href="create.php">Create New User</a>
        <h1>List of Users</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'connect_database.php';
                
                try {
                    $query = "SELECT * FROM users";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>';
                            echo '<a href="update.php?id=' . $row['id'] . '">Update</a> | ';
                            echo '<a href="delete.php?id=' . $row['id'] . '">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3">No users found</td></tr>';
                    }
                } catch (Exception $e) {
                    echo '<tr><td colspan="3">Error: ' . $e->getMessage() . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </body>
</html>

