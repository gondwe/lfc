<?php 

defined("BASEPATH") || exit("access denied");

class Stack_exchange extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function shuffle($t) {
        switch ($t) {

            /* when a new patient is registered  */
            case "patient_master" : 
                $this->load->model("patient_model");
                qstack("screeningq", "set", $id);
            break;

            /* when is done with the chaplain */
            case "chaplain":
                qstack("refractionq", "set", $id);
            break;

            /* when is done with the prescription */
            case "prescription":
                qstack("pharmacyq", "set", $id);
                qstack("cashierq", "set", $id);
            break;
        }
    }
}