<?php
function renderAppHeader()
{
  return <<<HTML
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- tailwind.css -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <!-- Bootstrap CSS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <title>Vet App</title>
<!-- BOOTSTRAP 4 SCRIPTS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: 'IBM Plex Sans', sans-serif;
    }
  </style>
</head>

<body class="w-full">
  <header class="flex justify-around px-4 py-6 bg-slate-800">
    <h1 class="text-2xl font-bold text-white">
      Vet App
    </h1>
      <div class="grid grid-cols-4 gap-5 place-items-center">
        <a href="/vetapp/app/new/pet.php">
          <button class="px-4 py-2 font-bold text-white transition bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit">
            Register a new pet
          </button>
        </a>
        <a href="/vetapp/app/index.php">
          <button class="px-4 py-2 font-bold text-white transition rounded bg-amber-500 hover:bg-amber-700 focus:outline-none focus:shadow-outline" type="submit">
            View your pets
          </button>
        </a>
        <a href="/vetapp/app/new/consultation.php">
          <button class="px-4 py-2 font-bold text-white transition rounded bg-sky-500 hover:bg-sky-700 focus:outline-none focus:shadow-outline" type="submit">
            Register a new consultation
          </button>
        </a>
        <a href="/vetapp/app/consultations.php">
          <button class="px-4 py-2 font-bold text-white transition bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline" type="submit">
            View your consultations
          </button>
        </a>
    </div>
    <a class="flex" href="/vetapp/app/logout.php">
      <button class="px-4 py-2 font-bold text-white transition bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline" type="submit">
        Logout
      </button>
    </a>
  </header>
HTML;
}
