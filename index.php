<?php 
	
include 'Telegram.php';

$telegram = new Telegram('5192813902:AAFlywjK7TjiZyDLglrH6Kb40RvFa3YuiNI');

$chat_id = $telegram->ChatID();
$text = $telegram->Text();
$orders = ["1 Кг - 100 000,0 сум", "2 Кг - 200 000,0 сум", "3 Кг - 300 000,0 сум", "4 Кг - 400 000,0 сумs"];

switch ($text) {
	case "/start":
		showStart();
		break;
	case "Биз хаккымызда":
		aboutMe();
		break;
	case "Буйыртпа бериу":
		orderList();
		break;
	default:
		if (in_array($text, $orders)) {
			file_put_contents('massa.txt', $text);
			askMessage();
		} eles {
			switch (file_get_contents('step.txt')) {
				case "phone": 
					file_put_contents('phone.txt', $text);
					showDeleveryType();
				break;
			}
		}
		break;
}

function showStart() {
	global $telegram, $chat_id;
	$option = array(
    	array(
    		$telegram->buildKeyboardButton("Биз хаккымызда"),
    		$telegram->buildKeyboardButton("Буйыртпа бериу")
    	)
    );
	$keyb = $telegram->buildKeyBoard($option, $onetime=true, $resize=true, $selective=true);
	$content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Ассаламу алейкум");
	$telegram->sendMessage($content);
}

function aboutMe() {
	global $telegram, $chat_id;
	$content = array('chat_id' => $chat_id, 'text' => "Биз хаккымызда");
	$telegram->sendMessage($content);
}

function orderList() {
	global $telegram, $chat_id;
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
}

function askMessage() {
	global $telegram, $chat_id;
	file_put_contents('step.txt', 'phone');
	$option = array(
    	array(
    		$telegram->buildKeyboardButton("Сиздин телефон номерининз", $request_contact = true),
    	),
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true, $resize=true, $selective=true);
	$content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Буйыртпа бериу ушын телефон номерининизди киритин");
	$telegram->sendMessage($content);
}

function showDeleveryType() {
	
}
	
?>