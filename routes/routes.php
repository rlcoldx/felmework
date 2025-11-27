<?php

use CoffeeCode\Router\Router;

$router = new Router(DOMAIN);

require_once 'routes/home/home.php';

$router->dispatch();
if ($router->error()) {
    echo "Página não encontrada.";
}