<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->group(null);

$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");

$route->get("/registro","Web:register");
$route->get("/login","Web:login");

$route->get("/localizacao","Web:location");
$route->get("/cursos","Web:courses");
$route->get("/cursos/{category}","Web:courses");
$route->get("/blog","Web:blog");
$route->get("/faq","Web:faq");
$route->get("/carrinho-compras","Web:chart");
$route->get("/servicos","Web:services");
$route->get("/contato","Web:contact");


// INICIO - APP
$route->get("/app", "App:home");
$route->get("/app/perfil", "App:profile");
// FIM - APP


$route->get("/ops/{errcode}", "Web:error");

$route->group("/app");
$route->get("/", "App:home");

$route->group(null);

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();
