<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($result);

  if (password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    header("Location: home.php");
  } else {
    echo "Login failed";
  }
}
?>
