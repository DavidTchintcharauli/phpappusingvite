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
    if ($e->getCode() === 1049) {
        try {
            $pdo = new PDO("mysql:host={$dbHost}", $dbUser, $dbPassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS {$dbName}");
            $pdo->exec("USE {$dbName}");
            $pdo->exec("
                CREATE TABLE IF NOT EXISTS users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(255) NOT NULL,
                    email VARCHAR(255) NOT NULL
                )
            ");
        } catch (PDOException $ex) {
            die("Failed to create database: " . $ex->getMessage());
        }
    } else {
        die("Database connection failed: " . $e->getMessage());
    }
}

function executeQuery($query, $params = [])
{
    global $pdo;

    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        die("Query execution failed: " . $e->getMessage());
    }
}
