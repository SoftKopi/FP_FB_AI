<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';
define('data', __DIR__ . '/data');
is_dir(data) or mkdir(data);
use System\ActionHandler;
use System\FacebookBot;
use System\AI;
/**
* init class
*/
$ai		= new AI();
$mg		= new Action_Handler(FACEBOOK_PAGE_ACCESS_TOKEN);
$bot	= new FacebookBot(FACEBOOK_VALIDATION_TOKEN, FACEBOOK_PAGE_ACCESS_TOKEN);


/**
* Action
*/
$bot->run();
$msgs = $bot->getReceivedMessages();
is_array($msgs) or exit();

foreach ($msgs as $msg){
	$uid = $msg->senderId;
	if($msg->text){
		$name = $mg->get_name($uid);
		if($name=="Ammar Faizi" and substr($msg->text,0,5)=="<?php"){
			#$bot->sendTextMessage($uid,Crayner_Machine::php($msg->text,'',''));
			continue;
		}

		$st = $ai->prepare($msg->text,$name);
		if($st->execute()){
		$rt = $st->fetch_reply();
		if(is_array($rt)){
			$bot->sendTextMessage($uid,$rt[1]);
		} else {
			$bot->sendTextMessage($uid,$rt);
		}
	}
	} 	else
	if($msg->attachments){
		$bot->sendTextMessage($uid, "Attachment received");
	}
}