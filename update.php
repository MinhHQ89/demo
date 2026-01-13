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

    try {
        if (isset($_POST['update'])) {
            if (!empty($_POST['name']) && !empty($_POST['email'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
                    $result = $stmt->execute([$name, $email, $id]);

                    if ($result) {
                        echo "Record updated successfully!";
                    }
                    else {
                        echo "Record updated failed!";
                    }
                }
                else {
                    echo "Email is not valid!";
                }
            }
            else {
              echo "Name and email are required!";
            }
        }

        if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else {
          echo "ID is required and must be a number!";
          exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
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