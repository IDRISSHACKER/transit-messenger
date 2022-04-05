<?php
require("models/tables/demande.table.php");
require("models/tables/mail.table.php");
require("models/tables/users.table.php");
require("models/fakers/users.faker.php");

$dbname   = "messenger";
$host     = "localhost";
$user     = "root";
$password = "";

$PDO;

try {
    $PDO = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    $PDO = new PDO("mysql:host=$host", $user, $password);
    $PDO->query("CREATE DATABASE $dbname");
    $PDO = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $PDO->query($demandeTable);
    $PDO->query($usersTable);
    $PDO->query($mailTable);
    $request = $PDO->prepare($userFaker);
    $request->execute([$emailFaker, $nomFaker, $pwdFaker, 1]);

    header("location: index.php");
}
