<?php 


class Fieldsets {

	private $thisb;
	public $orient;
	
	function __construct(){
		$this->db = db();
	}

	
	function fsets(){
		global $user;
		// $sid = $user->scode;
		$sid = 1;
		switch($this->table){
			case "users" : 
				$this->hide("password,salt,activation_code,forgotten_password_code,
							created_on,last_login,ip_address,forgotten_password_time,remember_code");
				$this->combo("user_type","select id, b from dataconf where a = 'usertype'");
			break;
			
			case "settings":
				$this->aliases("pobox,address");
				$this->aliases["pnumber"] = "phone";
				$this->aliases["location"] = "town";
				$this->pictures[] = "sign";
				$this->pictures[] = "logo";
			break;
			
			case "patient_master":
				$this->combos("sex","select id, b from dataconf where a = 'gender'");
				$this->aliases["patient_names"] = "names";
				$this->aliases["nationalid"] = "id no";
				$this->aliases["category"] = "section";
				$this->ucase("patient_names");
				$this->ucase("postaladdress");
				$this->aliases["postaladdress"] = "Address";
				$this->combos("category","select id, b from dataconf where a = 'patient_type'");
			break;


			case "optical_orders":
				$this->combos("lens_type", "select id, rxx(b) as b from  dataconf where a = 'lens_type'");
				$this->combos("frame_upcharge", "select id, b from  dataconf where a = 'upcharge'");
				$this->combos("addons", "select id, b from  dataconf where a = 'optical_cat'");
				$this->aliases["frame_upcharge"] = "frame & upcharge";
				$this->ucase("lens_type");
			break;

			case "dataconf" : 
				if($this->valuetype == 'religion') {
					$this->aliases("b,RELIGION");
					$this->hide("a,c,d");
					$this->hide("a");
				}
			break;
		}
		
	}

}