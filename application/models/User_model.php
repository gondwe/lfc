<?php 

class User_model extends CI_Model {
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
        $chaplain = ["chaplain"];
        $general_group = ["reception","ICT"];
        $allgroups = array_column($this->ion_auth->groups()->result(),"name");
        $mygroups = array_column($this->ion_auth->get_users_groups($id)->result(),"id");
        
        $username = $userdata->username;
        $names = $userdata->first_name." ".$userdata->last_name;
        $this->session->set_userdata(["username"=>$username]);
        $this->session->set_userdata(["names"=>$names]);
        $this->session->set_userdata(["admin_id"=>$id]);
        $this->session->set_userdata(["groups"=>$mygroups]);


        
        
        // $this->session->set_userdata(["groupq"=>$groupq]);
        // pf($allgroups);
        
        if($this->ion_auth->is_admin()) redirect("systems/admin");
        if($this->ion_auth->in_group($doc_group, $id)) redirect("doctor");
        if($this->ion_auth->in_group($chaplain, $id)) redirect("chaplain");
        if($this->ion_auth->in_group($general_group, $id)) redirect("screening");
        if($this->ion_auth->in_group($optical, $id)) redirect("optical");
        if($this->ion_auth->in_group($pharmacy, $id)) redirect("pharmacy");
        if($this->ion_auth->in_group($cashier, $id)) redirect("finance");

        

    }


    public function user_list(){
        return $this->db
            ->where_not_in("id",$this->session->user_id)
            ->select("id, username")
            ->get("users")
            ->result();
    }

    public function clear_unread(){
        $this->db->where("to_",$this->session->user_id)->set("recd", 1)->update("chat");
    }

    public function chat_thread($id){
        $or_one = " ( from_ = ".$this->session->user_id." and to_ = $id )" ;
        $or_two = " ( to_ = ".$this->session->user_id." and from_ = $id )" ;
        
        
        /* get total chats to display by default */
        $offset = 7;
        $list = $this->db->where($or_one)->or_where($or_two)->order_by("date", "ASC")->get("chat")->result();

        /* fix result to total chats */
        $list =array_splice($list,$offset*-1);
       
        /* set the converstation title */
        $title = rx($this->db->where("id", $id)->get("users")->row("username"));
        echo "<h6 class='text-dim text-right px-2'>$title</h6>";

        foreach($list as $msg){
            $side  = $msg->from_ === $this->session->user_id ? "left" : "right";
            $back  = $msg->from_ === $this->session->user_id ? "success" : "warning";
            echo "<div class='text-".$side."'><div class='m-1 px-2  alert-".$back." '  >".$msg->message."</div></div>";
        }

    }


    /* open web socket to multiple recipients  */
    public function push_multi($from, $to, $message){
        foreach($to as $chatuser){
            pushmessage($this->session->user_id,$chatuser, $message);
        }
    }

    /* fetch group notes  in general both read and unread*/
    public function gnotes(){
        $gids = implode("','",$this->session->groups);
        $skids = implode("','", gl("select distinct b from dataconf where c in ('$gids') and a = 'groupstore' "));
        $sk = implode("','",gl("Select b from dataconf where id in ('$skids') and a = 'group_cat'"));
        
        return get("select * from chat where to_ in ('$sk') limit 100");
    }
    





    

}