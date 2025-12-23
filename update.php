<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Update</title>
      <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <?php
    require_once 'connect_database.php';

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $email, $id);
        $result = $stmt->execute();
        $stmt->close();

        if ($result) {
            echo "Record updated successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();
    ?>
    <a href="read.php">Back to list</a>
    <h1>Update User</h1>
    <form method="post" action="" class="form-container">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      Name: <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
      Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
      <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
  </body>
</html>