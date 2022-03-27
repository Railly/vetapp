<?php
function renderToast($message, $type)
{
  $typeArray = array('success' => 'bg-green-500', 'danger' => 'bg-red-500', 'warning' => 'bg-orange-500');
  return <<<HTML
      <div class="$typeArray[$type] p-4 mt-5 ml-4 text-white font-medium max-w-lg" role="alert">
        $message
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
HTML;
}
