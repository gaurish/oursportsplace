<?php

class Controller {
    public $load;
    public $model;
    public $current_page;
    
    function __construct(){
        $this->load = new Load();
        $this->model = new Model();
    }
    
    function router() {
        $this->current_page = $_GET['page'];

        if( $this->current_page == 'contact') {
                $this->contact();
        } elseif( $this->current_page == 'gallery') {
                $this->gallery();
        } elseif( $this->current_page == 'fixture_info') {
                $this->fixture_info();
        } else {
            $this->home();
        }

   }
   
   function contact(){
        $this->display('contact.php');
   }

   function gallery(){
        $this->display('gallery.php');
   }

   function fixture_info(){
        $this->display('fixture_info.php');
   }

   function home(){
        $this->display('home.php');

   }

   function display($page){
        $this->load->view($page);
   }
}
