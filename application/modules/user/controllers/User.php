<?php 


class User extends MX_Controller {


    public function __construct()
    {
        parent :: __construct();
    }


    public function inbox(){
        $data["recent_msgs"] = $this->db->where("`to` = '".$this->session->user_id."' or `from` = '".$this->session->user_id."'")->get_compiled_select("chat");
        render("recent_messages", $data);
    }
    
}