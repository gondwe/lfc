<?php 


class Doctor_model extends CI_Model {
    


    function __construct(){
        Parent::__construct();
    }

    /* 
    *get a list of active doctors
    * */
    public function active_doctors () {
        return skylark_group("doctor");
    }

    public function procs(){
        return $this->db->select("id, prodesc")->get("procedures")->result();
    }


    public function theatrelist(){
                
        $list = [];

        $dates = $this->db
                        ->where("b.bkdate >= curdate()")
                        ->select("b.*, p.prodesc as procedure, concat(u.first_name,' ',u.last_name) as doc")
                        ->from("bookings b")
                        ->join("procedures p", "b.prodesc = p.id", "LEFT")
                        ->join("users u", "b.doctor = u.id", "LEFT")
                        ->order_by("b.bkdate", "asc")
                        ->get()
                        ->result();

        $specific = array_unique(array_column($dates, "bkdate"));


        foreach($specific as $d){ foreach($dates as $k=>&$dd){ if($d === $dd->bkdate){ $list[$d][] = $dates[$k]; unset($dates[$k]); } } }
        return $list;
    }
}