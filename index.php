<?php 
	
include 'Telegram.php';

$telegram = new Telegram('5192813902:AAFlywjK7TjiZyDLglrH6Kb40RvFa3YuiNI');

$chat_id = $telegram->ChatID();
$text = $telegram->Text();

if ($text == "/start") {
	$option = array(
    	array(
    		$telegram->buildKeyboardButton("Биз хаккымызда"),
    		$telegram->buildKeyboardButton("Буйыртпа бериу")
    	)
    );
	$keyb = $telegram->buildKeyBoard($option, $onetime=true, $resize=true, $selective=true);
	$content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Ассаламу алейкум");
	$telegram->sendMessage($content);	
} elseif ($text == "Биз хаккымызда") {
	$content = array('chat_id' => $chat_id, 'text' => "Биз хаккымызда");
	$telegram->sendMessage($content);
} elseif ($text == "Буйыртпа бериу") {
	$option = array(
    	array(
    		$telegram->buildKeyboardButton("1 Кг - 100 000,0 сум"),
    		$telegram->buildKeyboardButton("2 Кг - 200 000,0 сум"),
    	),
    	array(
    		$telegram->buildKeyboardButton("3 Кг - 300 000,0 сум"),
    		$telegram->buildKeyboardButton("4 Кг - 400 000,0 сум"),
    	),
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true, $resize=true, $selective=true);
	$content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Буйыртпаны сайлан");
	$telegram->sendMessage($content);
} elseif ($text = "1 Кг - 100 000,0 сум") {
	askMessage();
} elseif ($text = "2 Кг - 200 000,0 сум") {
	askMessage();
} elseif ($text = "3 Кг - 300 000,0 сум") {
	askMessage();
} elseif ($text = "4 Кг - 400 000,0 сумs") {
	askMessage();
}

function askMessage() {
	global $telegram, $chat_id;
	$option = array(
    	array(
    		$telegram->buildKeyboardButton("Сиздин телефон номерининз", $request_contact = true),
    	),
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true, $resize=true, $selective=true);
	$content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Буйыртпа бериу ушын телефон номерининизди киритин");
	$telegram->sendMessage($content);
}
	
?>