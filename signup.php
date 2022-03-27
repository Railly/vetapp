<?php
require('database/db.php');
require('components/header.php');
require('components/signupForm.php');
require('components/toast.php');

if (!empty($_POST['email']) && !empty($_POST['password'] && !empty($_POST['name']))) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  $query = "INSERT INTO patient (name, email, password) VALUES ('$name', '$email', '$password')";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    $_SESSION['message'] = 'Sorry, there was an error creating your patient account';
    $_SESSION['message_type'] = 'danger';
    die('Query Failed' . mysqli_error($conn));
  } else {
    $_SESSION['message'] = 'Successfully created new patient';
    $_SESSION['message_type'] = 'success';
  }
}
?>

<?php echo renderHeader() ?>
<?php echo renderSignupForm() ?>
<?php if (isset($_SESSION['message'])) {
  echo renderToast($_SESSION['message'], $_SESSION['message_type']);
  unset($_SESSION['message']);
  unset($_SESSION['message_type']);
}
?>

</body>

</html>