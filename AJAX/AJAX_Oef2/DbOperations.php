<?php
require_once "ConnectionBuilder.php";

$request_body = file_get_contents('php://input');
$json = json_decode($request_body);

if (isset($json->name)){
    $connection = ConnectionBuilder::GetConnection();
    $name = $json->name;

    $query = $connection->prepare('INSERT INTO people (name) VALUES (:name)');
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->execute();
}

if (isset($json->query)){
    $connection = ConnectionBuilder::GetConnection();
    $nameToQuery = $json->query;

    $query = $connection->prepare("SELECT Name FROM people WHERE Name LIKE '$nameToQuery%'");
    $query->execute();
    echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
}