<?php

function renderVetConsultationHeader()
{
  return <<<HTML
    <div class="grid grid-cols-7 pt-4 mb-4 rounded-t-lg bg-slate-800" >
      <h3 class="mb-4 text-xl text-center text-white">Owner</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Date</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Pet</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Status</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Payment</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Cost</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Actions</h3>
</div>
HTML;
}

function renderVetConsultationRow($consultation)
{
  $petName = $consultation['pet']['name'];
  $paymentText = $consultation['debt']['status'] != 'paid'  ? 'Pending' : 'Paid';
  $paymentStyle = $consultation['debt']['status'] != 'paid'  ? 'bg-amber-500' : 'bg-blue-500';
  $patientName = $consultation['patient']['name'];
  $status = $consultation['status'];
  $styles = array('to attend' => 'bg-red-500 ', 'attended' => 'bg-green-500 text-white font-medium');
  $text = array('to attend' => 'To attend', 'attended' => 'Attended');
  $cost = $consultation['cost'] ? 'S/. ' . $consultation['cost'] : '-';
  return <<<HTML
    <form class="grid grid-cols-7 gap-4 place-items-center" action="/vetapp/vet/index.php?id=$consultation[id_consultation]" method="post">
      <h3 class="mb-6 text-xl text-center text-gray-800">$patientName</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$consultation[date]</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$petName</h3>
      <!-- <h3 class="mb-6 text-xl text-center text-gray-800"><img src="$consultation[image]" alt="X-Ray" class="w-full"></h3> -->
      <!-- <h3 class="mb-6 text-xl text-center text-gray-800"><img src="$consultation[blood_test]" alt="Blood test" class="w-full"></h3> -->
      <h3 class="mb-6 text-xl h-max py-2 px-4 text-center text-white font-medium rounded-lg $styles[$status]">$text[$status]</h3>
      <h3 class="mb-6 text-xl text-center $paymentStyle py-2 px-4 rounded-lg font-medium text-gray-100">$paymentText</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$cost</h3>
      <div class="flex items-center justify-center w-full">
      <a class="h-max" href="/vetapp/vet/consultation/edit.php?id=$consultation[id_consultation]">
        <button 
          type="button"
          class="px-4 py-2 font-bold text-white transition bg-blue-500 rounded edit-consultation hover:bg-blue-700 focus:outline-none focus:shadow-outline">
          Edit
        </button>
      </a>
      <a class="mx-4 h-max" href="/vetapp/vet/consultation/payment.php?id=$consultation[id_consultation]">
        <button 
          type="submit"
          class="px-4 py-2 font-bold text-white transition rounded bg-amber-500 edit-consultation hover:bg-amber-700 focus:outline-none focus:shadow-outline">
          Check
        </button>
        </a>
      </div>
</form>
HTML;
}
