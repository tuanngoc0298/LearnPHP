<?php

use App\Exceptions\RouteNotFoundException;
use App\View;

require __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

session_start();

$route = new App\Router();

try {
    $route->get('/', [\App\Controller\HomeController::class, 'index'])
        ->get('/download', [\App\Controller\HomeController::class, 'download'])
        ->get('/invoices', [\App\Controller\InvoiceController::class, 'index'])
        ->get('/invoices/create', [\App\Controller\InvoiceController::class, 'create'])
        ->post('/invoices/create', [\App\Controller\InvoiceController::class, 'store'])
        ->post('/upload', [\App\Controller\HomeController::class, 'upload']);
    
    echo $route->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
} catch (RouteNotFoundException $e) {
    http_response_code(404);
    echo View::make('error/404');
}
