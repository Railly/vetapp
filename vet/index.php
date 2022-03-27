<?php
require('../database/db.php');
require('../components/vetHeader.php');
require('../components/pet.php');
require('../components/vetConsultation.php');

if (isset($_SESSION['id_vet'])) {
  $id_vet = $_SESSION['id_vet'];
  if ($id_vet) {
    $query_1 = ("SELECT id_vet, name, password FROM vet WHERE id_vet ='$id_vet'");
    $query_2 = ("SELECT id_consultation, date, status,cost, blood_test, image, medicines, id_pet FROM consultation WHERE id_vet ='$id_vet'");
    $result_1 = mysqli_query($conn, $query_1);
    $result_2 = mysqli_query($conn, $query_2);
    if (!$result_1) {
      $user = null;
      $consultations = null;
      Header("Location: /vetapp/vet/login.php");
    } else {
      $user = mysqli_fetch_assoc($result_1);
      $consultations = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
      if ($consultations) {
        foreach ($consultations as &$consultation) {
          $id_consultation = $consultation['id_consultation'];
          $query_3 = ("SELECT id_pet, name, id_species, age, weight FROM pet WHERE id_pet = (SELECT id_pet FROM consultation WHERE id_consultation = '$id_consultation')");
          $query_4 = ("SELECT id_patient, name FROM patient WHERE id_patient = (SELECT id_patient FROM consultation WHERE id_consultation = '$id_consultation')");
          $result_3 = mysqli_query($conn, $query_3);
          $result_4 = mysqli_query($conn, $query_4);
          $pet = mysqli_fetch_assoc($result_3);
          $patient = mysqli_fetch_assoc($result_4);
          $consultation['pet'] = $pet;
          $consultation['patient'] = $patient;
        }
      }
    }
  } else {
    header("Location: /vetapp/vet/index.php");
  }
} else {
  header("Location: /vetapp/login.php");
}
?>


<?php echo renderVetHeader() ?>


<div class="flex flex-col justify-center w-full px-4 py-6 my-6">
  <h1 class="mb-6 text-3xl text-center text-gray-800">Welcome <?php echo $user['name'] ?></h1>
  <h2 class="mb-4 text-2xl font-bold text-center">My consultations</h2>
  <div class="flex justify-center w-full">
    <div class="flex flex-col w-2/3 bg-gray-200 rounded-lg shadow-lg">
      <?php
      if ($consultations) {
        echo renderVetConsultationHeader();
        foreach ($consultations as $consultation) {
          echo renderVetConsultationRow($consultation);
        }
      } else {
        echo '<div class="w-1/2 p-4">';
        echo '<h3 class="mb-6 text-xl text-center text-gray-800">You have no pets &#128546;</h3>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
  </body>

  </html>