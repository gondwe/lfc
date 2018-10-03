<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

	public function index()
	{
		$data["data"] = "Welcome to Hosi";
		serve("welcome_message",$data);
	}
}
