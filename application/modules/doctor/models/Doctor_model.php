<?php 


class Doctor_model extends CI_Model {
    


    function __construct(){
        Parent::__construct();
    }

    /* 
    *get a list of active doctors
    * */
    public function active_doctors () {
        $groups = implode(",",gl("select id from groups where name in ('doctor','theatre','surgeon')"));
        $a = implode(",", gl("select distinct user_id from users_groups where group_id in ($groups) "));
        $b = gl("select concat_ws(' ',first_name, last_name) as names from users where id in ($a) ");

        return $b;
    }
}