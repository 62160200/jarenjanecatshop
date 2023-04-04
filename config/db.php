<?php
// Set database configuration variables
$host = "localhost";
$dbname = "catshoplover";
$user = "root";
$password = "";
// Set DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname";
// Set PDO options
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
// Create a PDO instance
try {
    $pdo = new PDO($dsn, $user, $password, $options);
    // echo "Connected to the database";
} catch(PDOException) {
    throw new PDOException("Could not connect to the database");
}
