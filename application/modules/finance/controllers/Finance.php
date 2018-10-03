<?php 

class Finance extends MX_Controller {

    function __construct(){
        $this->load->helper("receipt");
    }

    function index(){
        render("sales",[]);
    }


}