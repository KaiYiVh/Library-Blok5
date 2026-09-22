<?php

$dbhost = 'MariaDB';
$dbname = 'Boeken_Blok5A'; 
$dbuser = 'root';
$dbpass = 'password';

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);