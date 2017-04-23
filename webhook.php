<?php
require 'loader.php';
require 'config.php';
use System\Action_Handler;
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


foreach ($msgs as $msg){
	$uid = $msg->senderId;
	if($message->text){
		$st = $a->prepare($message->text);
		if($st->execute($mg->get_name($uid))){
		$rt = $st->fetch_reply();
		if(is_array($rt)){
			$bot->sendTextMessage($uid,$rt[1]);
		} else {
			$bot->sendTextMessage($uid,$rt);
		}
	}
	} 	else
	if($message->attachments){
		$bot->sendTextMessage($recipientId, "Attachment received");
	}
}