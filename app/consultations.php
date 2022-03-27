<?php
require('../database/db.php');
require('../components/appHeader.php');
require('../components/pet.php');
require('../components/consultation.php');

if (isset($_SESSION['id_patient'])) {
  $id_patient = $_SESSION['id_patient'];
  if ($id_patient) {
    $query_1 = ("SELECT id_patient, name, password FROM patient WHERE id_patient ='$id_patient'");
    $query_2 = ("SELECT id_consultation, date, cost, blood_test, image, medicines, id_pet, id_vet FROM consultation WHERE id_patient ='$id_patient'");
    $result_1 = mysqli_query($conn, $query_1);
    $result_2 = mysqli_query($conn, $query_2);
    if (!$result_1) {
      $user = null;
      $consultations = null;
      Header("Location: /vetapp/login.php");
    } else {
      $user = mysqli_fetch_assoc($result_1);
      $consultations = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
      if ($consultations) {
        foreach ($consultations as $consultation) {
          $query_3 = ("SELECT id_vet, name FROM vet WHERE id_vet ='$consultation[id_vet]'");
          $query_4 = ("SELECT id_pet, name FROM pet WHERE id_pet ='$consultation[id_pet]'");
          $result_3 = mysqli_query($conn, $query_3);
          $result_4 = mysqli_query($conn, $query_4);
          $vet = mysqli_fetch_assoc($result_3);
          $pet = mysqli_fetch_assoc($result_4);
          $consultation['vet'] = $vet;
          $consultation['pet'] = $pet;
          $consultations_array[] = $consultation;
        }
        // echo $consultations_array = json_encode($consultations_array);
      }
    }
  } else {
    header("Location: /vetapp/app/index.php");
  }
} else {
  // header("Location: /vetapp/login.php");
}
?>


<?php echo renderAppHeader() ?>


<div class="px-4 my-6 py-6 w-full flex justify-center flex-col">
  <h1 class="text-center text-3xl text-gray-800 mb-6">Welcome <?php echo $user['name'] ?></h1>
  <h2 class="font-bold text-2xl text-center mb-4">Your consultations</h2>
  <div class="w-full flex justify-center">
    <div class="flex flex-col w-2/3 bg-gray-200 rounded-lg shadow-lg">
      <?php
      if ($consultations_array) {
        echo renderConsultationHeader();
        foreach ($consultations_array as $consultation) {
          echo renderConsultationRow($consultation, $consultation['pet'], $consultation['vet']);
        }
      } else {
        echo '<div class="w-1/2 p-4">';
        echo '<h3 class="text-center text-xl text-gray-800 mb-6">You have no consultations &#128546;</h3>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
  </body>

  </html>