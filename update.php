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
<form method="post" action="" style="border: 1px solid #ccc; padding: 15px; width: 550px;">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  Name: <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
  Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
  <button type="submit" name="update" style="background-color: #007bff; color: white; padding: 8px 16px; border: none; border-radius: 3px;">
    Update
  </button>
</form>