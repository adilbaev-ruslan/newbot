<?php 
	
	include 'Telegram.php';

	$telegram = new Telegram('5192813902:AAFlywjK7TjiZyDLglrH6Kb40RvFa3YuiNI');

	$chat_id = $telegram->ChatID();
	$text = $telegram->Text();

	if ($text == "/start") {

		$option = array(
	    	array(
	    		$telegram->buildKeyboardButton("🇺🇿 Узбекском"),
	    		$telegram->buildKeyboardButton("🇬🇧 English")
	    	)
	    );
		
		$keyb = $telegram->buildKeyBoard($option, $onetime=false);

		$content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Botimizga xosh keldiniz tildi tanlan");
		$telegram->sendMessage($content);	
	}
	
 ?>