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
            <tbody id="users-list">
                <?php
                require_once 'connect_database.php';
                
                try {
                    $query = "SELECT * FROM users";
                    $result = $conn->query($query);
                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                    if (count($rows) > 0) {
                        foreach ($rows as $row) {
                            echo '<tr id="user-' . $row['id'] . '">';
                            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                            echo '<td>';
                            echo '<a href="update.php?id=' . $row['id'] . '">Update</a> | ';
                            echo '<a href="#" class="delete-link" data-id="' . $row['id'] . '">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3">No users found</td></tr>';
                    }
                } catch (PDOException $e) {
                    echo '<tr><td colspan="3">Error: ' . htmlspecialchars($e->getMessage()) . '</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <script src="delete_table.js"></script>
    </body>
</html>

