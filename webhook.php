<?php
file_put_contents("logs.txt",json_encode(array("header"=>getallheaders(),"post"=>$_POST,"get"=>$_GET,)));
require_once 'config.php';
require_once 'FacebookBot.php';
$bot = new FacebookBot(FACEBOOK_VALIDATION_TOKEN, FACEBOOK_PAGE_ACCESS_TOKEN);
$bot->run();
$messages = $bot->getReceivedMessages();
include "class/AI.php";
$a = new AI();
foreach ($messages as $message)
{
	$recipientId = $message->senderId;
	if($message->text)
	{
		$st = $a->prepare($message->text);
		$st->execute("Esa Teh team#");
		$a[] = array("a",$bot->sendTextMessage($recipientId, $st->fetch_reply()));
	}
	elseif($message->attachments)
	{
		$a[] = array("b",$bot->sendTextMessage($recipientId, "Attachment received"));
	}
}
file_put_contents("qweq.txt",json_encode(array($a,$st->fetch_reply())));