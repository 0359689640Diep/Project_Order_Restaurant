<?php

use Dotenv\Dotenv;

use App\app\routers\index;
use App\app\routers\Router;

session_start();
require_once __DIR__ . "../../../vendor/autoload.php";


$dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

new index;
$router = new Router;
$router->resolve();

function test($data)
{
    echo "<pre>";
    var_dump($data);
    die();
}

function select($nameSelect, $data)
{
    if (array_key_exists($nameSelect, $data)) {
        return $data[$nameSelect];
    } else {
        return null; // hoặc giá trị mặc định khác tùy thuộc vào trường hợp cụ thể
    }
}
