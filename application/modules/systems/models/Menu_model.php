<?php 

class Menu_model extends CI_Model {


    protected $gnotecount = 0;
    protected $noteLimit = 3;

    public function index(){
        return $menus = [
            "system"=>[
                "users"=>["auth/index"],
                "training_checklist"=>["doctor/training"],
                "logout",
            ],
        
            "services"=>[
                "clinic"=>["screening/dashboard"],
                "pharmacy"=>["pharmacy"],
                "optical"=>["optical"],
                "cashier"=>["finance"],
            ],
        
            "inventory"=>[
                "items"=>["finance/items"],
                "requisition"=>["items/requisition"],
            ],
        ];
            
    }


    public function inbox_data(){
        
        $max = 7;
        $ul = gl("select id, username from users");
        $unread = $this->db->order_by("date","DESC")->where("`to_` = '".$this->session->user_id."'")->where("recd",0)->get("chat")->result();

        $old = [];
        $new = [];
        $older = [];

        $msgcount = count($unread);
        $offset = $max - $msgcount;

        if(empty($unread) || $max > $msgcount){
            $old = $this->db->order_by("date","DESC")->where("`to_` = '".$this->session->user_id."'")->where("`recd` = 1")->get("chat")->result();
            $old = array_splice($old, -$offset);
        }
        $buddies = array_count_values(array_column($unread,"from_"));

        foreach ($buddies as $a => $b) {
            foreach ($unread as $c => &$d) {
                if($a == $d->from_){ $new[$a][] = $d; unset($unread[$c]); }
            } 
        }
        $buddies = array_count_values(array_column($old,"from_"));
        
        foreach ($buddies as $a => $b) {
            foreach ($old as $c => &$d) {
                if($a == $d->from_){ $older[$a][] = $d; unset($old[$c]); }
            } 
        }

        return [
            "ul"=>$ul,
            "new"=>$new,
            "older"=>$older,
            "msgcount"=>$msgcount,
            "gnotes"=>array_slice($this->groupnotes(),0,$this->noteLimit),
            "gnotecount"=>$this->gnotecount-$this->noteLimit,
        ];

    }


    public function groupnotes(){

        $gids = implode("','",$this->session->groups);
        $mine = array_column(get("select distinct b from dataconf where c in ('$gids') and a = 'groupstore' "),"b");
        if(empty($mine)) return []; 
        $skids = implode("','", $mine);
        $mine2 = array_column(get("Select b from dataconf where id in ('$skids') and a = 'group_cat'"),"b");
        if(empty($mine2)) return []; 
        
        $sk = implode("','",$mine2);
        
        $gnotes = get("select * from chat where to_ in ('$sk') and recd = 0 limit 20");
        $this->gnotecount = count($gnotes);
        return $gnotes;
        
    }

}