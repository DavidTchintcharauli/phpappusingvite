<?php

require_once '../db.php';

function getUsers() {
    $query = "SELECT * FROM users";
    $result = executeQuery($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function createUser($data) {
    $name = $data['name'];
    $email = $data['email'];
    
    $query = "INSERT INTO users (name, email) VALUES (?, ?)";
    $params = [$name, $email];
    executeQuery($query, $params);
    
    return ['message' => 'User created successfully'];
}

function updateUser($id, $data) {
    $name = $data['name'];
    $email = $data['email'];
    
    $query = "UPDATE users SET name = ?, email = ? WHERE id = ?";
    $params = [$name, $email, $id];
    executeQuery($query, $params);
    
    return ['message' => 'User updated successfully'];
}

function deleteUser($id) {
    $query = "DELETE FROM users WHERE id = ?";
    $params = [$id];
    executeQuery($query, $params);
    
    return ['message' => 'User deleted successfully'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = getUsers();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $response = createUser($data);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['id'];
    unset($data['id']);
    $response = updateUser($id, $data);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['id'];
    $response = deleteUser($id);
} else {
    http_response_code(405);
    $response = ['error' => 'Method Not Allowed'];
}

header('Content-Type: application/json');
echo json_encode($response);

?>