<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'usr' => $_ENV['DB_USR'],
        'psd' => $_ENV['DB_PSD'],

    ]
];
$app = new Application(__DIR__, $config);

$app->db->applyMigrations();

