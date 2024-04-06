<?php
require_once 'controllers/usersController.php';

$routes = [
    '/api/users' => 'usersController.php',
];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    foreach ($routes as $route => $controller) {
        if ($_SERVER['REQUEST_URI'] === $route) {
            require_once "controllers/{$controller}";
            exit;
        }
    }
}

http_response_code(404);
echo '404 Not Found';

?>