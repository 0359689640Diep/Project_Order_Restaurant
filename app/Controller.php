<?php 
class Controller{
    public $view = null;
    public $layoutPath = null;
    public function loadView($viePath, $data = null) {
        if(file_exists("views/$viePath")) {
            ob_start();
            if($data != null)
            extract($data);
            include "views/$viePath";
            $this->view= ob_get_contents();
            ob_get_clean();
        }
        if($this->layoutPath != null) 
            include "views/$this->layoutPath";
        else
            echo $this->view;
    }
}
?>