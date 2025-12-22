<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Delete</title>
  </head>
  <body>
    <?php
    require_once 'connect_database.php';

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();

        if ($result) {
            echo "Record deleted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
    <a href="read.php">Back to list</a>
    <form method="post" action="" style="border: 1px solid #ccc; padding: 15px; width: 550px;">
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
      Are you sure you want to delete this record?
      <button type="submit" name="delete" style="background-color: red; color: white; padding: 8px 16px; border: none; border-radius: 3px;">
        Delete
      </button>
    </form>
  </body>
</html>