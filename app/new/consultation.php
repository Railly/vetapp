<?php
require('../../database/db.php');
require('../../components/appHeader.php');
require('../../components/consultationForm.php');
require('../../components/toast.php');

if (isset($_SESSION['id_patient'])) {
  $id_patient = $_SESSION['id_patient'];
  $query_1  = ("SELECT id_pet, name FROM pet WHERE id_patient ='$id_patient'");
  $query_2 = ("SELECT id_vet, name FROM vet");
  $result_1 = mysqli_query($conn, $query_1);
  $result_2 = mysqli_query($conn, $query_2);

  if (!$result_1) {
    $_SESSION['message'] = 'Sorry, your account could not be found';
    $_SESSION['message_type'] = 'danger';
    $pets = null;
    $vets = null;
  } else {
    $pets = mysqli_fetch_all($result_1, MYSQLI_ASSOC);
    $vets = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
  }
}

if (!empty($_POST['id_pet']) && !empty($_POST['id_vet']) && !empty($_POST['date'])) {
  $id_pet = $_POST['id_pet'];
  $id_vet = $_POST['id_vet'];
  $id_patient = $_SESSION['id_patient'];
  $date = $_POST['date'];
  $query = ("INSERT INTO consultation (id_pet, id_vet, id_patient, date) VALUES ('$id_pet', '$id_vet', '$id_patient', '$date')");
  $result = mysqli_query($conn, $query);
  echo mysqli_error($conn);
  if (!$result) {
    $_SESSION['message'] = 'Sorry, your account could not be found';
    $_SESSION['message_type'] = 'danger';
  } else {
    $_SESSION['message'] = 'Your consultation has been scheduled';
    $_SESSION['message_type'] = 'success';
  }
}
?>

<?php echo renderAppHeader() ?>
<h2 class="text-center text-xl text-gray-800 font-bold my-4">Make a consultation</h2>
<?php
echo renderConsultationForm(json_encode($pets), json_encode($vets));
?>
<?php if (isset($_SESSION['message'])) {
  echo renderToast($_SESSION['message'], $_SESSION['message_type']);
  unset($_SESSION['message']);
  unset($_SESSION['message_type']);
}
?>
</body>

</html>