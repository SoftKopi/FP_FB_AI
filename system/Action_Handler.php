<?php
namespace System;
use System/Crayner_Machine;

class Action_Handler
{
	private $token;
	public function __construct($token)
	{
		$this->token = $token;
	}
	public function get_name($uid)
	{
		$a = json_decode(Crayner_Machine::curl("https:/graph.facebook.com/".$uid."?fields=first_name,last_name&access_token=".$this->token),true);
		if($a===null){
			return "Bro";
		}
		return $a['first_name'].(isset($a['last_name'])?' '.$a['last_name']:'');
	}
}