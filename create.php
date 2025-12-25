<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Create</title>
      <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
    require_once 'connect_database.php';

    try {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];

            $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
            $result = $stmt->execute([$name, $email]);

            if ($result) {
                echo "Record added successfully!";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
    <a href="read.php">Back to list</a>
    <h1>Create New User</h1>
    <form method="post" action="" class="form-container">
      Name: <input type="text" name="name" required>
      Email: <input type="email" name="email" required>
        <button type="submit" name="submit" class="btn btn-primary">Create</button>
    </form>
  </body>
</html>