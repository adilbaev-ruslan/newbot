<?php 
	
	include 'Telegram.php';

	$telegram = new Telegram('5192813902:AAFlywjK7TjiZyDLglrH6Kb40RvFa3YuiNI');

	$chat_id = $telegram->ChatID();

	$text = $telegram->Text();

	$content = array('chat_id' => $chat_id, 'text' => $text);
	$telegram->sendMessage($content);
	
 ?>