<?php
// Start the session and connect to the database
session_start();
$conn = mysqli_connect("mysql", "user", "root", "dibyo") or die();

// Check if the user is logged in
if (!isset($_SESSION['member_id'])) {
  header("Location: login.php");
  exit;
}

// Get the member ID and email from the session
$member_id = $_SESSION['member_id'];
$email = $_SESSION['email'];

// Retrieve the current member data from the database
$query = "SELECT * FROM data_member WHERE id_member=$member_id AND email='$email'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $current_fullname = $row['fullname'];
  $current_email = $row['email'];
  $current_password = $row['password'];
} else {
  die("Error retrieving member data: " . mysqli_error($conn));
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the updated member data from the form submission
  $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $current_password_input = mysqli_real_escape_string($conn, $_POST['current_password']);
  $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
  $confirm_new_password = mysqli_real_escape_string($conn, $_POST['confirm_new_password']);

  // Check that the current password is correct
  if (!password_verify($current_password_input, $current_password)) {
    $error = "Current password is incorrect";
  } else {
    // Update the member data in the database
    $query = "UPDATE data_member SET fullname='$fullname', email='$email'";
    if (!empty($new_password) && $new_password === $confirm_new_password) {
      $hash = password_hash($new_password, PASSWORD_DEFAULT);
      $query .= ", password='$hash'";
    }
    $query .= " WHERE id_member=$member_id AND email='$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
      // Update the session variables with the new member data
      $_SESSION['fullname'] = $fullname;
      $_SESSION['email'] = $email;

      // Redirect back to the form page with a success message
      header("Location: update_member_form.php?success=1");
      exit;
    } else {
      die("Error updating member data: " . mysqli_error($conn));
    }
  }
}
?>