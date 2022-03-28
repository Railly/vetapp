
<?php
function renderVetConsultationForm($consultation)
{
  return (<<<HTML
    <div class="flex justify-center w-full">
      <form class="w-1/3 px-4 py-6 mx-4 my-4 bg-white rounded-lg shadow-md" method="POST" action="/vetapp/vet/consultation/edit.php?id=$consultation[id_consultation]" enctype="multipart/form-data">
        <div class="mb-4">
          <label class="block mb-2 text-sm font-bold text-gray-700" for="age">
            Blood test
          </label>
          <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="blood_test" type="text" placeholder="Blood test" name="blood_test">
        </div>
        <div class="mb-4">
          <label class="block mb-2 text-sm font-bold text-gray-700" for="weight">
            Medicines
          </label>
          <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="medicines" type="text" placeholder="Medicines" name="medicines">
        </div>
        <div class="mb-4">
          <label class="block mb-2 text-sm font-bold text-gray-700" for="diagnosis">
            Diagnosis
          </label>
          <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="diagnosis" type="text" placeholder="Diagnosis" name="diagnosis">
          </div>
        <div class="mb-4">
        <div class="mb-4">
          <label class="block mb-2 text-sm font-bold text-gray-700" for="image">
            X-ray image
          </label>
          <input type="file" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" id="image" name="image">
        </div>
        <div class="mb-4">
          <label class="block mb-2 text-sm font-bold text-gray-700" for="cost">
            Cost
          </label>
          <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="cost" type="text" placeholder="Cost" name="cost">
        </div>
        <div class="flex justify-center">
          <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit">
            Update
          </button>
        </div>
      </form>
      </div>
    <script>
    </script>
HTML
  );
}
