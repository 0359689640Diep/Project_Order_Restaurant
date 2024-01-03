<?php

namespace App\app\controllers;

class BaseController
{
    public $view = null;
    public $layoutPath = null;
    public function loadView($viePath, $data = null)
    {
        if (file_exists("../../src/app/views/$viePath")) {
            ob_start();
            if ($data != null)
                extract($data);
            include "../../src/app/views/$viePath";
            $this->view = ob_get_contents();
            ob_get_clean();
        }
        if ($this->layoutPath != null)
            include "../../src/app/views/$this->layoutPath";
        else
            echo $this->view;
    }

    public function authentication()
    {
        if (isset($_SESSION["email"]) == false) {
            header("location:index.php?controller=login");
        }
    }
}
