<?php 
class Printer extends MX_Controller {
    
    
    function __construct(){
        // $this->load->library("webkit");
    }


    function receipt(){
        $this->load->view("index");
        // $this->load->view("index");
        
        // $this->webkit->init();
        // $this->webkit->display();
        
        
    }


    function create(){
        pf($_POST);
        $_SESSION["pdf"] = $_POST["cont"];
    }
}