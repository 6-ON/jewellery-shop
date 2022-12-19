<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;
use app\models\User;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'usr' => $_ENV['DB_USR'],
        'psd' => $_ENV['DB_PSD'],

    ]
];
$app = new Application(dirname(__DIR__), $config);


$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handlingContact']);

$app->router->get('/about', [SiteController::class, 'about']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/dashboard', [AuthController::class, 'dashboard']);
$app->router->post('/dashboard', [AuthController::class, 'dashboard']);


$app->router->get('/createProduct', [AuthController::class, 'createProduct']);
$app->router->post('/createProduct', [AuthController::class, 'createProduct']);

$app->router->get('/editProduct', [AuthController::class, 'editProduct']);
$app->router->post('/editProduct', [AuthController::class, 'editProduct']);


$app->router->get('/gallery', [SiteController::class, 'gallery']);

$app->run();