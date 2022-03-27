<?php

require('database/db.php');
require('components/header.php');
require('components/loginForm.php');
require('components/toast.php');

if (isset($_SESSION['user_id'])) {
  header('Location: /vetapp/app/index.php');
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = ("SELECT id_patient, email, password FROM patient WHERE email = '$email'");
  $result = mysqli_query($conn, $query);
  // print the email column
  $user = mysqli_fetch_assoc($result);


  if ($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['id_patient'] = $user['id_patient'];
    header("Location: /vetapp/app/index.php");
  } else {
    $_SESSION['message'] = 'Sorry, those credentials do not match' . mysqli_error($conn);
    $_SESSION['message_type'] = 'danger';
  }
}

?>

<?php echo renderHeader() ?>
<?php echo renderLoginForm() ?>
<?php if (isset($_SESSION['message'])) {
  echo renderToast($_SESSION['message'], $_SESSION['message_type']);
  unset($_SESSION['message']);
  unset($_SESSION['message_type']);
}
?>

</body>

</html>