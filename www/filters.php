<?php

include 'database.php';

$sql = "SELECT * FROM Boeken";
$params = [];
$where = [];


// Zoekfunctie
if (isset($_GET["search"]) && $_GET["search"] !== '') {
    $filter = $_GET["search"];

    $where[] = "(titel LIKE :search 
                OR auteur LIKE :search)";
    $params[':search'] = '%' . $filter . '%';
}


// Author filter
if (isset($_GET["auteur"]) && $_GET["auteur"] !== '') {
    $where[] = "auteur = :auteur";
    $params[':auteur'] = $_GET["auteur"];
}

if (isset($_GET["genre"]) && $_GET["genre"] !== '') {
    $where[] = "genre = :genre";
    $params[':genre'] = $_GET["genre"];
}

// WHERE toevoegen
if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}


// Query uitvoeren
$stmt = $conn->prepare($sql);
$stmt->execute($params);

$books = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Aantal resultaten
$count = count($books);

?>