<?php

require __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
session_start();

$route = new App\Router();

$route->get('/', [\App\Controller\Home::class, 'index'])
    ->get('/invoices', [\App\Controller\Invoice::class, 'index'])
    ->get('/invoices/create', [\App\Controller\Invoice::class, 'create'])
    ->post('/invoices/create', [\App\Controller\Invoice::class, 'store'])
    ->post('/upload', [\App\Controller\Home::class, 'upload']);

echo $route->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
