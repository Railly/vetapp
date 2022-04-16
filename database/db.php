<?php
require __DIR__ . '/../vendor/autoload.php';


session_start();

$conn = mysqli_init();

if (!$conn) {
  die("mysqli_init failed");
}


// mysqli_ssl_set($con,"key.pem","cert.pem","cacert.pem",NULL,NULL);

mysqli_real_connect(
  $conn,
  'rh-17-do-user-11374260-0.b.db.ondigitalocean.com:25060',
  'doadmin',
  'AVNS_1De2LETJbDck61D',
  'defaultdb'
) or die(mysqli_error($mysqli));

mysqli_set_charset($conn, "utf8mb3");