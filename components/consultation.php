<?php

function renderConsultationHeader()
{
  return <<<HTML
    <div class="grid grid-cols-9 pt-4 mb-4 rounded-t-lg bg-slate-800" >
      <h3 class="mb-4 text-xl text-center text-white">Vet</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Date</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Pet</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">X-Ray</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Blood test</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Medicines</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Diagnosis</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Status</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100">Cost</h3>
</div>
HTML;
}

function renderConsultationRow($consultation, $pet, $vet)
{
  $id_consultation = $consultation['id_consultation'];
  $debt = $consultation['debt'] && $consultation['debt']['status'] == 'paid' ? 'Paid' : 'Pending';
  $debtStyle = $consultation['debt'] && $consultation['debt']['status'] == 'paid' ? 'bg-green-500' : 'bg-red-500';
  $medicines = json_encode(array_map(function ($medicine) {
    // split by ", "
    return explode(", ", $medicine);
  }, array('item' => $consultation['medicines'])));
  if (!$consultation['image']) {
    $consultation['image'] = "https://via.placeholder.com/120x100?text=no+x-ray-image";
  } else {
    $consultation['image'] = '../uploads/' . $consultation['image'];
  }

  if (!$consultation['blood_test']) {
    $consultation['blood_test'] = "-";
  }

  if (!$consultation['diagnosis']) {
    $consultation['diagnosis'] = "-";
  }

  $consultation['cost'] = $consultation['cost'] ? 'S/. ' . $consultation['cost'] : '-';
  return <<<HTML
    <div class="grid grid-cols-9 gap-10 place-items-center" >
      <h3 class="mb-6 text-xl text-center text-gray-800">$vet[name]</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$consultation[date]</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$pet[name]</h3>
      <img src="$consultation[image]" alt="X-Ray" class="w-full m-2">
      <h3 class="mb-6 text-xl text-center text-gray-800">$consultation[blood_test]</h3>
      <ul id="$id_consultation" class="mb-6 text-xl text-center text-gray-800">
      </ul>
      <h3 class="mb-6 text-xl text-center text-gray-800">$consultation[diagnosis]</h3>
      <h3 class="mb-6 text-xl text-center text-gray-100 px-4 py-2 font-medium rounded-lg $debtStyle">$debt</h3>
      <h3 class="mb-6 text-xl text-center text-gray-800">$consultation[cost]</h3>
</div>
<script>
  var medicines = $medicines;
  console.log(medicines);
  var id_consultation = "$id_consultation";
  var ul = document.getElementById(id_consultation);
  medicines.item.forEach(function(medicine) {
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(medicine));
    li.classList.add("list-disc");
    ul.appendChild(li);
  });
  </script>
HTML;
}
