<?php

use Dotenv\Dotenv;

use App\src\app\routers\index;
use App\src\app\routers\Router;
use App\src\assets\global\Auto_Check;

session_start();
require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

new Auto_Check;
new index;

$router = new Router;
$router->resolve();

function test($data)
{
    echo "<pre>";
    var_dump($data);
    die();
}
function test1($data)
{
    echo "<pre>";
    var_dump($data);
    echo "<pre>";
}

function select($nameSelect, $data)
{
    if (array_key_exists($nameSelect, $data)) {
        return $data[$nameSelect];
    } else {
        return "Không có dữ liệu";
    }
}
