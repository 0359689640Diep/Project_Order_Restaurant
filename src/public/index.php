<?php 

use App\app\controllers\HomeController;
use App\app\Router;
use Dotenv\Dotenv;

require_once __DIR__. "../../../vendor/autoload.php";
$dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

$router = new Router;

Router::get('/', [HomeController::class, 'index']);

$router->resolve();

?>