<?php
/*
* Load class is for dynamically loading  files(mostly views)
* during runtime
*/
Class Load {
    /*
    * Load view by doing $this->load->view('index.php')
    * @param array $fileName File Name of view e.g index.php
    */
    function view($fileName, $row=null) {
        require_once( ACTIVITY_PATH . 'activity-mvc-framework/html/' . $fileName);
    }
}
