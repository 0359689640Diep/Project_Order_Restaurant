<?php 
    session_start();
    include "../app/Connection.php";
    include "../app/Controller.php";
    
    $controller = isset($_GET["controller"]) ? $_GET["controller"] : "Home";
    $action = isset($_GET["action"]) ? $_GET["action"] : 'index';
    
    $fileController = "controllers/".ucfirst($controller)."Controller.php";
    // ten class
    
    $classController = ucfirst($controller)."Controller";
    // load file controller
    include $fileController;
    if(class_exists($classController)){
        $obj = new $classController();
        $obj->$action;
    }else{
        echo "class khong ton tai"; die();
    }
?>