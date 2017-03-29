<?php


$voornaam = $_GET['voornaam'];
$achternaam = $_GET['achternaam'];
$eventnaam = $_GET['eventnaam'];
$startdatum = $_GET['startdatum'];
$einddatum = $_GET['einddatum'];

echo $voornaam . '</br>';
echo $achternaam . '</br>';
echo $eventnaam . '</br>';
echo $startdatum . '</br>';
echo $einddatum . '</br>';

$user = 'root';
$password = 'root';
$database = 'Monkey_Business';
$pdo = null;
try {
    $pdo = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $pdo->query("INSERT INTO events (event_name, start_date, end_date, personid)
                              VALUES ('$eventnaam', '$startdatum', '$einddatum', 52)");
    $statement->setFetchMode(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    print 'Exception!: ' . $e->getMessage();
}
$pdo = null;


?>