<?php
class Admin extends Controller{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index(){
        // print_r($_SESSION);
        $data['title'] = 'Panel Administrativo';
        $this->views->getView('admin','home',$data);
    }   
    
}
?>