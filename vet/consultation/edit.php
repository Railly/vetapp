<?php
require('../../database/db.php');
require('../../components/vetHeader.php');
require('../../components/vetConsultationForm.php');
require('../../components/toast.php');

if (isset($_SESSION['id_vet'])) {
  $id_consultation = $_GET['id'];
  $query = ("SELECT id_consultation, date, status,cost, blood_test, image, medicines, id_pet FROM consultation WHERE id_consultation = '$id_consultation'");
  $result = mysqli_query($conn, $query);
  if (!$result) {
    $consultation = null;
    Header("Location: /vetapp/vet/consultation/index.php");
  } else {
    $consultation = mysqli_fetch_assoc($result);
    if ($consultation) {
      $id_consultation = $consultation['id_consultation'];
      $query_1 = ("SELECT id_pet, name, id_species, age, weight FROM pet WHERE id_pet = (SELECT id_pet FROM consultation WHERE id_consultation = '$id_consultation')");
      $query_2 = ("SELECT id_patient, name FROM patient WHERE id_patient = (SELECT id_patient FROM consultation WHERE id_consultation = '$id_consultation')");
      $result_1 = mysqli_query($conn, $query_1);
      $result_2 = mysqli_query($conn, $query_2);
      $pet = mysqli_fetch_assoc($result_1);
      $patient = mysqli_fetch_assoc($result_2);
      $consultation['pet'] = $pet;
      $consultation['patient'] = $patient;
    }
  }
} else {
  Header("Location: /vetapp/vet/login.php");
}

if (!empty($_FILES["image"]["name"]) && !empty($_POST["cost"]) && !empty($_POST["blood_test"]) && !empty($_POST["medicines"]) && !empty($_POST["diagnosis"])) {
  // File upload path
  $targetDir = "../../uploads/";
  $fileName = basename($_FILES["image"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  // Allow certain file formats
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
  if (in_array($fileType, $allowTypes)) {
    // Upload file to server
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
      // Insert image file name into database
      $query = "UPDATE consultation SET image = '$fileName', cost = '$_POST[cost]', blood_test = '$_POST[blood_test]', medicines = '$_POST[medicines]', diagnosis = '$_POST[diagnosis]', status = 'attended' WHERE id_consultation = '$id_consultation'";
      $query2 = "INSERT INTO debt (id_pet, id_consultation, amount) VALUES ((SELECT id_pet FROM consultation WHERE id_consultation = '$id_consultation'), '$id_consultation', '$_POST[cost]')";
      $result = mysqli_query($conn, $query);
      $result2 = mysqli_query($conn, $query2);
      echo mysqli_error($conn);
      if ($result && $result2) {
        $_SESSION['message'] = "The consultation has been updated successfully.";
        $_SESSION['message_type'] = "success";
      } else {
        $_SESSION['message'] = "Something went wrong, please try again.";
        echo mysqli_error($conn);
        $_SESSION['message_type'] = "danger";
      }
    } else {
      $_SESSION['message'] = "Sorry, there was an error uploading your file.";
      $_SESSION['message_type'] = "danger";
    }
  } else {
    $_SESSION['message'] = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    $_SESSION['message_type'] = "danger";
  }
}
?>

<?php echo renderVetHeader() ?>

<div class="flex flex-col justify-center w-full px-4 py-6 my-6">
  <h1 class="mb-6 text-3xl text-center text-gray-800">
    <?php echo $consultation['pet']['name'] ? 'Edit consultation for <b>' . $consultation['pet']['name'] . "</b>" : 'Edit consultation' ?>
    <?php echo $consultation['patient']['name'] ? '<span class="text-lg text-gray-600">(Owner: ' . $consultation['patient']['name'] . ')</span>' : '' ?>
  </h1>
  <div class="flex justify-center w-full">
    <div class="flex flex-col w-2/3 bg-gray-200 rounded-lg shadow-lg">
      <?php echo renderVetConsultationForm($consultation) ?>
    </div>
  </div>
</div>

<?php if (isset($_SESSION['message'])) {
  echo renderToast($_SESSION['message'], $_SESSION['message_type']);
  unset($_SESSION['message']);
  unset($_SESSION['message_type']);
}
?>