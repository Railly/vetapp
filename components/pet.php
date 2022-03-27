<?php

function renderPetHeader()
{
  return <<<HTML
    <div class="grid grid-cols-5 bg-slate-800 pt-4 rounded-t-lg mb-4" >
      <h3 class="text-center text-xl text-gray-100 mb-6">Name</h3>
      <h3 class="text-center text-xl text-gray-100 mb-6">Age (yrs.)</h3>
      <h3 class="text-center text-xl text-gray-100 mb-6">Weight (Kg.)</h3>
      <h3 class="text-center text-xl text-gray-100 mb-6">Species</h3>
      <h3 class="text-center text-xl text-gray-100 mb-6">Actions</h3>
</div>
HTML;
}

function renderPetRow($pet)
{
  return <<<HTML
    <div class="grid grid-cols-5" >
      <h3 class="text-center text-xl text-gray-800 mb-6">$pet[name]</h3>
      <h3 class="text-center text-xl text-gray-800 mb-6">$pet[age]</h3>
      <h3 class="text-center text-xl text-gray-800 mb-6">$pet[weight]</h3>
      <h3 class="text-center text-xl text-gray-800 mb-6">$pet[species]</h3>
      <h3 class="text-center text-xl text-gray-800 mb-6">
        <!-- See consultas -->
        <a class="text-blue-500 hover:text-blue-700" href="/vetapp/app/consultations.php?id_pet=$pet[id_pet]">
          Ver historial
            <i class="fas fa-search"></i>
        </a>
      </h3>
</div>
HTML;
}
