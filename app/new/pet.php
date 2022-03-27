<?php
require('../../database/db.php');
require('../../components/appHeader.php');
require('../../components/petForm.php');
require('../../components/toast.php');

if (isset($_SESSION['id_patient'])) {
  $id_patient = $_SESSION['id_patient'];
  $query_1 = ("SELECT id_species, name FROM species");
  $result_1 = mysqli_query($conn, $query_1);

  if (!$result_1) {
    $_SESSION['message'] = 'Sorry, your account could not be found';
    $_SESSION['message_type'] = 'danger';
    $species = null;
  } else {
    $species = mysqli_fetch_all($result_1, MYSQLI_ASSOC);
  }
}

if (!empty($_POST['id_species']) && !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['weight'])) {
  $id_patient = $_SESSION['id_patient'];
  $id_species = $_POST['id_species'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $weight = $_POST['weight'];

  $query_2 = ("INSERT INTO pet (id_species, name, id_patient, age, weight) VALUES ('$id_species', '$name', '$id_patient', '$age', '$weight')");
  $result_2 = mysqli_query($conn, $query_2);

  if (!$result_2) {
    $_SESSION['message'] = 'Sorry, your pet could not be added';
    $_SESSION['message_type'] = 'danger';
  } else {
    $_SESSION['message'] = 'Your pet has been added';
    $_SESSION['message_type'] = 'success';
  }
}
?>

<?php echo renderAppHeader() ?>
<h2 class="text-center text-xl text-gray-800 font-bold my-4">Register your pet</h2>
<?php
echo renderPetForm(json_encode($species));
?>
<?php if (isset($_SESSION['message'])) {
  echo renderToast($_SESSION['message'], $_SESSION['message_type']);
  unset($_SESSION['message']);
  unset($_SESSION['message_type']);
}
?>
</body>

</html>