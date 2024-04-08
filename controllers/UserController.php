<?php

require_once 'db.php';

class UserController
{
    public static function getPDO()
    {
        $host = 'localhost';
        $dbname = 'dbphpappvite';
        $username = 'root';
        $password = '';

        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public static function getUsers()
    {
        $pdo = self::getPDO();

        $stmt = $pdo->query('SELECT * FROM users');
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public static function createUser($data)
    {
        $pdo = self::getPDO();

        $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$data['name'], $data['email'], $data['password']]);

        return ['message' => 'User created successfully'];
    }

    public static function updateUser($id, $data)
    {
        $pdo = self::getPDO();

        $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?');
        $stmt->execute([$data['name'], $data['email'], $data['password'], $id]);

        return ['message' => 'User updated successfully'];
    }

    public static function deleteUser($id)
    {
        $pdo = self::getPDO();

        $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$id]);

        return ['message' => 'User deleted successfully'];
    }
}
