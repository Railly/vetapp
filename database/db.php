<?php

session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'mydb'
) or die(mysqli_error($mysqli));
