<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Create</title>
  </head>
  <body>
    <?php
    require_once 'connect_database.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        $result = $stmt->execute();
        $stmt->close();

        if ($result) {
            echo "Record added successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
    <form method="post" action="" style="border: 1px solid #ccc; padding: 15px; width: 550px;">
      Name: <input type="text" name="name" required>
      Email: <input type="email" name="email" required>
        <button type="submit" name="submit" style="background-color: #007bff; color: white; padding: 8px 16px; border: none; border-radius: 3px;">
          Submit
        </button>
    </form>
  </body>
</html>