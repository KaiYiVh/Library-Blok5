<?php

$menuItems = [
    'Home' => '/ingelogd.php',
    'Boeken' => 'boeken.php',
    'Boek Toevoegen'=>'book_create.php',
    'Geleende Boeken'=>'Boeken_history.php'
];

echo '<ul class="menu">';
foreach ($menuItems as $key => $value) {
    echo '<li><a href="' . $value . '">' . $key . '</a></li>';
}
echo '</ul>';


?>