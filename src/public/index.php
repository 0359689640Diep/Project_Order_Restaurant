<?php

use App\app\Router;
use Dotenv\Dotenv;
use App\app\controllers\HomeController;
use App\app\controllers\AuthController;
use App\app\controllers\ProductDetails;

session_start();
require_once __DIR__ . "../../../vendor/autoload.php";


$dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

$router = new Router;

Router::get('/', [HomeController::class, "index"]);
Router::get("/login", [AuthController::class, "login"]);
Router::post("/login", [AuthController::class, "login"]);
Router::get("/signIn", [AuthController::class, "signIn"]);
Router::post("/signIn", [AuthController::class, "signIn"]);
Router::get("/verifyAccount", [AuthController::class, "verifyAccount"]);
Router::post("/verifyAccount", [AuthController::class, "verifyAccount"]);
Router::get("/productDetails", [ProductDetails::class, "index"]);

$router->resolve();

function test($data)
{
    echo "<pre>";
    var_dump($data);
    die();
}
