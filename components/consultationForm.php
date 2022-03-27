
<?php
function renderConsultationForm($pets, $vets)
{
  return (<<<HTML
    <div class="w-full flex justify-center">
      <form class="px-4 mx-4 my-4 py-6 bg-white shadow-md rounded-lg w-1/3" method="POST" action="/vetapp/app/new/consultation.php">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="id_pet">
            Pet's name
          </label>
          <!-- select  -->
          <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="id_pet" id="id_pet">
            <option value="">Select a pet</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="id_vet">
            Vet's name
          </label>
          <!-- select  -->
          <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="id_vet" id="id_vet">
            <option value="">Select a vet</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="date">
            Fecha y hora
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date" type="date" placeholder="Date" name="date">
        </div>
        <div class="flex justify-center">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Create
          </button>
        </div>
      </form>
      </div>
    <script>
      const pets = JSON.parse('{$pets}');
      const vets = JSON.parse('{$vets}');
      console.log(pets);
      console.log(vets);
      const petsSelect = document.getElementById('id_pet');
      pets.forEach(pet => {
        const option = document.createElement('option');
        option.value = pet.id_pet;
        option.innerText = pet.name;
        petsSelect.appendChild(option);
      });
      const vetsSelect = document.getElementById('id_vet');
      vets.forEach(vet => {
        const option = document.createElement('option');
        option.value = vet.id_vet;
        option.innerText = vet.name;
        vetsSelect.appendChild(option);
      });
    </script>
HTML
  );
}
