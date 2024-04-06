<?php
require_once 'config.php';
require_once 'db.php';
require_once 'routes.php';

//handle incoming requests
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestPath = $_SERVER['REQUEST_URI'];

$routes = [

];

foreach ($routes as $route => $controller) {
    if ($requestPath === $route && $requestMethod === 'GET') {
        $controllerParts = explode('::', $controller);
        $controllerFile = $controllerParts[0];
        $controllerFunction = $controllerParts[1];
        
        require_once "controllers/{$controllerFile}";
        $response = call_user_func($controllerFunction);
        
        // Return the response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}

// If no route matches, return a 404 error
http_response_code(404);
echo '404 Not Found';

?>