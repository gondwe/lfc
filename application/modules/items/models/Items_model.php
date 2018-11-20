<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**

 * akc 2018

 * @author:gondwe

 */





class Items_model extends CI_Model 

{

	

	protected $iid;

	function __construct()

	{

		parent::__construct();

		// $this->load->database();

		$this->iid =  $this->session->scode ;

	}



	function _count(){

		$in =  gt("select count(id) from tbl_item");

	}



	function search($req){

		return get("select id, name as item, unitPrice as unit_cost from items where name like '$req%' or code ='$req' limit 10");
		
	}


    

    public function itemslist(){

        return gl("select * from tbl_item"); 

    }

	



}