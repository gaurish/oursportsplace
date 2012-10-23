<?php

class Controller {
    public $load, $model, $current_page, $bp_group_id, $is_form_submission, $can_edit;
    
    function __construct(){
        $this->load = new Load();
        $this->model = new Model();
        $this->bp_group_id = bp_get_group_id();

        //set the current page
        if(isset($_GET['page'])){
            $this->current_page = $_GET['page'];
        }
        //check if its a form submission
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //seems like a form submission via HTTP POST method, lets handle it diffently
            $this->is_form_submission = true;
            $this->current_page = $_POST['page'];
        }

        //check if current user is admin or mod
        if(bp_group_is_mod() or bp_group_is_admin()){
          $this->can_edit = true;
        }

        //load the header with css & js scripts
        $this->display('header.php');
    }
    
    //displays the page based value of $_GET['page'] or $_POST['page']
    function router() {

        if( $this->current_page == 'contact') {
                $this->contact_page();
        } elseif( $this->current_page == 'gallery') {
                $this->gallery_page();
        } elseif( $this->current_page == 'fixture_info') {
                $this->fixture_info_page();
        } elseif ($this->current_page == 'contact_form') {
              $this->contact_form();
        } elseif ($this->current_page == 'add_team') {
              $this->add_team();
        }
        else {
            $this->home_page();
        }

    }

    //used for add team feature on fixture_info page
    function add_team() {
        if(!empty($_POST['team_name']) && $this->can_edit){
          $data = $this->model->add_team($this->bp_group_id);  
        }else{
          $data['subteam']['message'] = "not logged in OR invalid request";
        }
        $this->display('fixture_info.php', $data);
    }

    function contact_page(){
        //this is a normal request, so lets just render the html/contact.php page
            $data = $this->model->get_group_info($this->bp_group_id);
            $this->display('contact.php', $data);
    }

   function contact_form(){
      $data = $this->model->get_group_info($this->bp_group_id);
      $this->display('contact_form.php', $data);
   }

   function gallery_page(){
        //this is a normal request, so lets just render the html/gallery.php page
        $this->display('gallery.php');
   }

   function gallery_form(){
     # code...
   }

   function fixture_info_page(){
      //this is a normal request, so lets just render the html/fixture_info.php page
        $data = $this->model->get_subteam_list($this->bp_group_id);
        $this->display('fixture_info.php', $data);
   }

   function fixture_info_form(){
     # code
   }

   function home_page(){
        $this->display('home.php');

   }

   function display($page, $data=null){
        $this->load->view($page, $data);
   }
}