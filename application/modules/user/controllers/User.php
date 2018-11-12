<?php 


class User extends MX_Controller {


    public function __construct()
    {
        parent :: __construct();
        $this->load->model("user_model");
    }


    public function inbox(){
        
        $all = $this->db->where("`to_` = '".$this->session->user_id."' or `from_` = '".$this->session->user_id."'")->get("chat")->result();       
        $from  = array_column($all,"from_"); $to = array_column($all, "to_");
        
        $chat_users = array_unique(array_merge($from, $to));
        $data["userlist"] = $this->user_model->user_list();
        $buddies = array_diff($chat_users, [$this->session->user_id] );
        $data["chatlist"] = array_map(function($id){ return $this->db->select("id, username")->where("id", $id)->get("users")->row(); },$buddies);

        $data["allmsgs"] = $all;
        render("recent_messages", $data);
    }
    

    
    /* set the active chat access list tab */
    function activechat($action,$id){

        switch($action){
            case "set" : $this->session->set_userdata('activechat', $id); break;
            case "send" : pushmessage($this->session->user_id, $id, $_REQUEST["p"] ); break;
            case "sendall" : 
                $this->user_model->push_multi($this->session->user_id, $_REQUEST["p"], $_REQUEST["m"]); 
                $this->session->set_userdata('activechat', current($_REQUEST["p"])); 
                break;
            case "get" : $this->user_model->chat_thread($id); break;
            case "reset" : $this->user_model->clear_unread(); break;
        }
        
    }


    /* display group notifications  */
    public function gnotes(){
        $data["notes"] = $this->user_model->gnotes();
        render("g_notifications", $data);
    }
}