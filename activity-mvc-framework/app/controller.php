<?php

class Controller {
    public $load;
    public $model;
    
    function __construct(){
        $this->load = new Load();
        $this->model = new Model();
    }
    
    function router() {
        switch(isset($_GET['page'])) {
            case 'contact':
                $this->display('contact.php');
                break;
            case 'gallery':
                $this->display('gallery.php');
                break;
            case 'fixture_info':
                $this->display('fixture_info.php');
                break;
            default:
                $this->display('home.php');
                break;
        }
   }

   function display($page){
        $this->load->view('header.php');
        $this->load->view($page);
   }
}
