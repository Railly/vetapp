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
    if (isset($_GET['id_pet'])) {
      $query_3 = ("SELECT id_consultation, date, cost, blood_test, image, medicines, id_pet, id_vet FROM consultation WHERE id_patient ='$id_patient' AND id_pet = '$_GET[id_pet]'");
      $result_3 = mysqli_query($conn, $query_3);
    }
    $result_1 = mysqli_query($conn, $query_1);
    $result_2 = mysqli_query($conn, $query_2);
    if (!$result_1) {
      $user = null;
      $consultations = null;
      Header("Location: /vetapp/login.php");
    } else {
      $user = mysqli_fetch_assoc($result_1);
      $consultations_array = array();
      if (isset($_GET['id_pet'])) {
        $consultations = mysqli_fetch_all($result_3, MYSQLI_ASSOC);
      } else {
        $consultations = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
      }
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

if (isset($_GET['id'])) {
}
?>


<?php echo renderAppHeader() ?>


<div class="flex flex-col justify-center w-full px-4 py-6 my-6">
  <h1 class="mb-6 text-3xl text-center text-gray-800">Welcome <?php echo $user['name'] ?></h1>
  <h2 class="mb-4 text-2xl font-bold text-center">Your consultations <?php if (isset($_GET['id_pet'])) {
                                                                        echo "(Pet's name: " . $pet['name'] . ')';
                                                                      } ?></h2>
  <div class="flex justify-center w-full">
    <div class="flex flex-col w-2/3 bg-gray-200 rounded-lg shadow-lg">
      <?php
      if ($consultations_array) {
        echo renderConsultationHeader();
        foreach ($consultations_array as $consultation) {
          echo renderConsultationRow($consultation, $consultation['pet'], $consultation['vet']);
        }
      } else {
        echo '<div class="w-1/2 p-4">';
        echo '<h3 class="mb-6 text-xl text-center text-gray-800">You have no consultations &#128546;</h3>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
  </body>

  </html>