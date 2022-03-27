
<?php

function renderSignupForm()
{
  return <<<HTML
    <div class="flex justify-center w-full">
      <form class="w-1/3 px-4 py-6 mx-4 my-6 bg-white rounded-lg shadow-md" method="POST" action="signup.php">
        <div class="mb-4">
          <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
            Name
          </label>
          <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Name" name="name">
        </div>
        <div class="mb-4">
          <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
            Email
          </label>
          <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Email" name="email">
        </div>
        <div class="mb-6">
          <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
            Password
          </label>

          <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="************" name="password">
        </div>
        <div class="flex items-center justify-between">
          <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="submit">
            Sign Up
          </button>
          <a class="inline-block text-sm font-bold text-blue-500 align-baseline hover:text-blue-800" href="/vetapp/login.php">
            Already have an account?
          </a>
        </div>
      </form>
    </div>
HTML;
}
