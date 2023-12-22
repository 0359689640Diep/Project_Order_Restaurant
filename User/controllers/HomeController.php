<?php
include_once "models/HomeModel.php";

class HomeController extends Controller {
    use HomeModel;
    public function __construct()
    {
        $this->getProduct();
        // echo "<pre>";
        // var_dump();
    }
}

?>