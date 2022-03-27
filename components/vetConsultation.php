<?php

function renderVetConsultationHeader()
{
  return <<<HTML
    <div class="grid grid-cols-6 pt-4 mb-4 rounded-t-lg bg-slate-800" >
      <h3 class="mb-4 text-xl text-center text-white">Patient</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Date</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Pet</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Status</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Cost</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Actions</h3>
</div>
HTML;
}

function renderVetConsultationRow($consultation)
{
  $petName = $consultation['pet']['name'];
  $patientName = $consultation['patient']['name'];
  $status = $consultation['status'];
  $disabled = json_encode($status == 'attended');
  $styles = array('to attend' => 'bg-red-500 ', 'attended' => 'bg-green-500 text-white font-medium');
  $text = array('to attend' => 'To attend', 'attended' => 'Attended');
  $buttonText = array('to attend' => 'Attend', 'attended' => 'Attended');
  return <<<HTML
    <div class="grid grid-cols-6" >
      <h3 class="mb-6 text-xl text-center text-gray-800">$patientName</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$consultation[date]</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$petName</h3>
      <!-- <h3 class="mb-6 text-xl text-center text-gray-800"><img src="$consultation[image]" alt="X-Ray" class="w-full"></h3> -->
      <!-- <h3 class="mb-6 text-xl text-center text-gray-800"><img src="$consultation[blood_test]" alt="Blood test" class="w-full"></h3> -->
      <h3 class="mb-6 text-xl text-center text-white font-medium rounded-lg $styles[$status]">$text[$status]</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$consultation[cost]</h3>
      <div class="flex justify-center">
      <a class="h-max" href="/vetapp/vet/consultation/edit.php?id=$consultation[id_consultation]">
        <button 
          id="edit-consultation"
          class="px-4 py-2 font-bold text-white transition bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
          $buttonText[$status]
        </button>
      </a>
      </div>
</div>
<script>
  console.log(JSON.parse('$disabled'), "disabled");
    document.getElementById('edit-consultation').disabled = JSON.parse('{$disabled}');
    if(JSON.parse('{$disabled}')){
      document.getElementById('edit-consultation').classList.remove('bg-blue-500', 'hover:bg-blue-700');
      document.getElementById('edit-consultation').classList.add('bg-gray-400', 'cursor-not-allowed');
    }
  </script>
HTML;
}
