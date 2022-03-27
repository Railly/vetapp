
<?php
function renderPetForm($species)
{
  return (<<<HTML
    <div class="w-full flex justify-center">
      <form class="px-4 mx-4 my-4 py-6 bg-white shadow-md rounded-lg w-1/3" method="POST" action="/vetapp/app/new/pet.php">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Pet's name
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Pet's name" name="name"> 
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="id_species">
            Species
          </label>
          <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="id_species" id="id_species">
            <option value="">Select a species</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="age">
            Age
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="age" type="text" placeholder="Age" name="age">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="weight">
            Weight
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="weight" type="text" placeholder="Weight" name="weight">
        </div>
        <div class="flex justify-center">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Create
          </button>
        </div>
      </form>
      </div>
    <script>
      const species = JSON.parse('{$species}');
      const speciesSelect = document.getElementById('id_species');
      species.forEach(pet => {
        const option = document.createElement('option');
        option.value = pet.id_species;
        option.innerText = pet.name;
        speciesSelect.appendChild(option);
      });
    </script>
HTML
  );
}
