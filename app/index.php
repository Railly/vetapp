<?php
require('../database/db.php');
require('../components/appHeader.php');
require('../components/pet.php');
require('../components/consultation.php');

if (isset($_SESSION['id_patient'])) {
  $id_patient = $_SESSION['id_patient'];
  if ($id_patient) {
    $query_1 = ("SELECT id_patient, name, password FROM patient WHERE id_patient ='$id_patient'");
    $query_2  = ("SELECT id_pet, name, id_species, age, weight FROM pet WHERE id_patient ='$id_patient'");
    $query_3 = ("SELECT id_consultation, date, cost, blood_test, image, medicines, id_pet FROM consultation WHERE id_patient ='$id_patient'");
    $result_1 = mysqli_query($conn, $query_1);
    $result_2 = mysqli_query($conn, $query_2);
    if (!$result_1) {
      $user = null;
      $pets = null;
      Header("Location: /vetapp/login.php");
    } else {
      $user = mysqli_fetch_assoc($result_1);
      $pets = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
      if ($pets) {
        foreach ($pets as $pet) {
          $query_4 = ("SELECT name FROM species WHERE id_species ='$pet[id_species]'");
          $query_5 = ("SELECT SUM(amount) AS total FROM debt WHERE (status = 'no paid') AND id_pet = '$pet[id_pet]'");
          $result_4 = mysqli_query($conn, $query_4);
          $result_5 = mysqli_query($conn, $query_5);
          $species = mysqli_fetch_assoc($result_4);
          $debt = mysqli_fetch_assoc($result_5);
          echo mysqli_error($conn);
          $pet['species'] = $species['name'];
          $pet['debt'] = $debt['total'];
          $pets_array[] = $pet;
        }
      }
    }
  } else {
    header("Location: /vetapp/app/index.php");
  }
} else {
  header("Location: /vetapp/login.php");
}
?>


<?php echo renderAppHeader() ?>


<div class="flex flex-col justify-center w-full px-4 py-6 my-6">
  <h1 class="mb-6 text-3xl text-center text-gray-800">Welcome <?php echo $user['name'] ?></h1>
  <h2 class="mb-4 text-2xl font-bold text-center">My pets</h2>
  <div class="flex justify-center w-full">
    <div class="flex flex-col w-2/3 bg-gray-200 rounded-lg shadow-lg">
      <?php
      if ($pets) {
        echo renderPetHeader();
        foreach ($pets_array as $pet) {
          echo renderPetRow($pet);
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