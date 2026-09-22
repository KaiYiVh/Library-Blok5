<?php

$menuItems = [
    'Home' => '/index.php',
    'Books' => '/',

];

echo '<ul class="flex space-x-6">';
foreach ($menuItems as $key => $value) {
    $menuItems[$key] = $value;
    echo '<li><a href="' . $value . '" class="text-gray-300 hover:text-white">' . ($key) . '</a></li>';
}
echo '</ul>';

?>