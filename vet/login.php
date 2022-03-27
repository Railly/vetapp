<?php

require('../database/db.php');
require('../components/header.php');
require('../components/loginForm.php');
require('../components/toast.php');

if (isset($_SESSION['id_vet'])) {
  header('Location: /vetapp/vet/index.php');
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = ("SELECT id_vet, email, password FROM vet WHERE email = '$email'");
  $result = mysqli_query($conn, $query);
  // print the email column
  $user = mysqli_fetch_assoc($result);


  if ($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['id_vet'] = $user['id_vet'];
    header("Location: /vetapp/vet/index.php");
  } else {
    $_SESSION['message'] = 'Sorry, those credentials do not match' . mysqli_error($conn);
    $_SESSION['message_type'] = 'danger';
  }
}

?>

<?php echo renderHeader() ?>
<?php echo renderLoginForm('Vet') ?>
<?php if (isset($_SESSION['message'])) {
  echo renderToast($_SESSION['message'], $_SESSION['message_type']);
  unset($_SESSION['message']);
  unset($_SESSION['message_type']);
}
?>

</body>

</html>