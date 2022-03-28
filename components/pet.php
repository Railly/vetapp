<?php

function renderPetHeader()
{
  return <<<HTML
    <div class="grid grid-cols-6 pt-4 mb-4 rounded-t-lg bg-slate-800" >
      <h3 class="mb-6 text-xl text-center text-gray-100">Name</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Age (yrs.)</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Weight (Kg.)</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Species</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Debt</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Actions</h3>
</div>
HTML;
}

function renderPetRow($pet)
{
  $styleDebt = intval($pet['debt']) > 10 ? 'bg-red-500' : 'bg-green-500';
  $pet['debt'] = $pet['debt'] ? 'S/. ' . $pet['debt'] : 'S/. 0.00';
  return <<<HTML
    <div class="grid grid-cols-6" >
      <h3 class="mb-6 text-xl text-center text-gray-800">$pet[name]</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$pet[age]</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$pet[weight]</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$pet[species]</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100 rounded-lg $styleDebt">$pet[debt]</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">
        <!-- See consultas -->
        <a class="text-blue-500 hover:text-blue-700" href="/vetapp/app/consultations.php?id_pet=$pet[id_pet]">
          Ver historial
            <i class="fas fa-search"></i>
        </a>
      </h3>
</div>
HTML;
}
