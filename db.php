<?php

$dbHost = 'localhost';
$dbName = 'dbphpappvite';
$dbUser = 'root';
$dbPassword = '';

try {
    $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

function executeQuery($query, $params = []) {
    global $pdo;

    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        die("Query execution failed: " . $e->getMessage());
    }
}

?>