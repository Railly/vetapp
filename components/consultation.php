<?php

function renderConsultationHeader()
{
  return <<<HTML
    <div class="grid grid-cols-7 bg-slate-800 pt-4 rounded-t-lg mb-4" >
      <h3 class="text-center text-xl text-white mb-4">Vet</h3>
      <h3 class="text-center text-xl text-gray-100 mb-6">Date</h3>
      <h3 class="text-center text-xl text-gray-100 mb-6">Pet</h3>
      <h3 class="text-center text-xl text-gray-100 mb-6">X-Ray</h3>
      <h3 class="text-center text-xl text-gray-100 mb-6">Blood test</h3>
      <h3 class="text-center text-xl text-gray-100 mb-6">Medicines</h3>
      <h3 class="text-center text-xl text-gray-100 mb-6">Cost</h3>
</div>
HTML;
}

function renderConsultationRow($consultation, $pet, $vet)
{
  return <<<HTML
    <div class="grid grid-cols-7" >
      <h3 class="text-center text-xl text-gray-800 mb-6">$vet[name]</h3>
      <h3 class="text-center text-xl text-gray-800 mb-6">$consultation[date]</h3>
      <h3 class="text-center text-xl text-gray-800 mb-6">$pet[name]</h3>
      <h3 class="text-center text-xl text-gray-800 mb-6">
        <!-- See consultas -->
        <a class="text-blue-500 hover:text-blue-700" href="/vetapp/app/xray.php?id_consultation=$consultation[id_consultation]">
          Ver
            <i class="fas fa-search"></i>
        </a>
      </h3>
      <h3 class="text-center text-xl text-gray-800 mb-6">
        <!-- See consultas -->
        <a class="text-blue-500 hover:text-blue-700" href="/vetapp/app/bloodtest.php?id_consultation=$consultation[id_consultation]">
          Ver
            <i class="fas fa-search"></i>
        </a>
      </h3>
      <h3 class="text-center text-xl text-gray-800 mb-6">
        <!-- See consultas -->
        <a class="text-blue-500 hover:text-blue-700" href="/vetapp/app/medicines.php?id_consultation=$consultation[id_consultation]">
          Ver
            <i class="fas fa-search"></i>
        </a>
      </h3>
      <h3 class="text-center text-xl text-gray-800 mb-6">$consultation[cost]</h3>
</div>
HTML;
}
