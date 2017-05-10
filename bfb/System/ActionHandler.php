<?php
namespace system;
use system\CraynerMachine;
use Curl\CMCurl;
class ActionHandler
{
	private $token;
	public function __construct($token)
	{
		$this->token = $token;
	}
	public function get_name($uid)
	{
		$a = json_decode((new CMCurl("https://graph.facebook.com/".$uid."?fields=first_name,last_name&access_token=".$this->token))->execute(),true);
		if($a===null){
			return "Bro";
		}
		return $a['first_name'].(isset($a['last_name'])?' '.$a['last_name']:'');
	}
}