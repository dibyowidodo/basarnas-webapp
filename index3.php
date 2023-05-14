<?php
session_start();

// check if user is logged in
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}

// establish database connection
$conn = mysqli_connect("mysql", "user", "root", "dibyo") or die();

// retrieve current user data
$id_member = $_SESSION['id_member'];
$sql = "SELECT fullname, email, password FROM data_member WHERE id_member = $id_member";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // retrieve form data
  $new_fullname = $_POST['fullname'];
  $new_email = $_POST['email'];
  $new_password = $_POST['password'];
  
  // check if current password is correct
  $current_password = $_POST['current_password'];
  $hashed_password = $row['password'];
  if (!password_verify($current_password, $hashed_password)) {
    // show error message
    $error_message = "Current password is incorrect";
  } else {
    // update user data in database
    $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE data_member SET fullname='$new_fullname', email='$new_email', password='$new_hashed_password' WHERE id_member=$id_member";
    mysqli_query($conn, $sql);

    // redirect to success page
    header('Location: success.php');
    exit;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update User Data</title>
</head>
<body>
  <h1>Update User Data</h1>
  <form method="POST">
    <label for="fullname">Full Name:</label>
    <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>"><br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
    <label for="password">New Password:</label>
    <input type="password" name="password"><br>
    <label for="current_password">Current Password:</label>
    <input type="password" name="current_password"><br>
    <button type="submit">Save Changes</button>
  </form>

  <?php if (isset($error_message)): ?>
    <div class="modal">
      <p><?php echo $error_message; ?></p>
      <button onclick="closeModal()">Close</button>
    </div>

    <script>
      function closeModal() {
        document.querySelector('.modal').style.display = 'none';
      }
    </script>
  <?php endif; ?>
    </body>
    </html> 