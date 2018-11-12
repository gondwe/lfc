<?php 

class User extends CI_Model {
    function __construct(){

    }

    function init(){

        // implement dragula tohandle groups
        
        $id = $this->session->user_id;
        $userdata = $this->db->where("id",$id)->get("users")->row();
        $doc_group = ["nurse","doctor","surgeon","laboratory","theatre"];
        $optical = ["optical shop"];
        $cashier = ["cashier"];
        $pharmacy = ["pharmacy"];
        $general_group = ["reception","ICT"];
        $allgroups = array_column($this->ion_auth->groups()->result(),"name");
        $mygroups = array_column($this->ion_auth->get_users_groups($id)->result(),"name");
        
        $username = $userdata->username;
        $names = $userdata->first_name." ".$userdata->last_name;
        $this->session->set_userdata(["username"=>$username]);
        $this->session->set_userdata(["names"=>$names]);
        $this->session->set_userdata(["groups"=>$mygroups]);


        // switch($allgroups){
        //     case "admin" : $groupq = 'adminq'; break;
        //     case "members" : $groupq = 'memberq'; break;
        //     case "doctor" : $groupq = 'doctorq'; break;
        //     case "laboratory" : $groupq = 'doctorq'; break;
        //     case "nurse" : $groupq = 'doctorq'; break;
        //     case "optical" : $groupq = 'opticalq'; break;
        //     case "others" : $groupq = 'otherq'; break;
        //     case "pharmacy" : $groupq = 'pharmacyq'; break;
        //     case "reception" : $groupq = 'screeningq'; break;
        //     case "resident doctor" : $groupq = 'doctorq'; break;
        //     case "surgeon" : $groupq = 'theatreq'; break;
        //     case "theatre" : $groupq = 'theatreq'; break;
        //     case "ict" : $groupq = 'ictq'; break;
        //     case "cashier" : $groupq = 'cashier'; break;
            
        //     default : $groupq = 'guestq'; break;
        // }

      

        
        // $this->session->set_userdata(["groupq"=>$groupq]);
        // pf($allgroups);
        
        if($this->ion_auth->is_admin()) redirect("systems/admin");
        if($this->ion_auth->in_group($doc_group, $id)) redirect("doctor");
        if($this->ion_auth->in_group($general_group, $id)) redirect("screening");
        if($this->ion_auth->in_group($optical, $id)) redirect("optical");
        if($this->ion_auth->in_group($pharmacy, $id)) redirect("pharmacy");
        if($this->ion_auth->in_group($cashier, $id)) redirect("finance/cashier");

        

    }


    

}