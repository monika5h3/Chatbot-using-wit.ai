<?php
require_once "database/config.php";
require_once "database/functions.php";
error_reporting(0);


$question = $_POST['ques'];
// $category = $_POST['category'];
// $question = "when are the IT 4-2 supplementary exams";


$witRoot = "https://api.wit.ai/message?";
$witVersion = "20230711";
$input_utterance = urlencode($question);
$witURL = $witRoot . "v=" . $witVersion . "&q=" . $input_utterance;
//echo $witURL;
$ch = curl_init();
$header = array();
$header[] = "Authorization:Bearer SUCHV4SMTRB2EKPVXTS6D5VYFUNK7LHF";

curl_setopt($ch, CURLOPT_URL, $witURL);
curl_setopt($ch, CURLOPT_POST, 0);  //sets method to POST (1 = TRUE)
curl_setopt($ch, CURLOPT_HTTPHEADER, $header); //sets the header value above - required for wit.ai authentication
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //inhibits the immediate display of the returned data
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$server_output = curl_exec($ch); //call the URL and store the data in $server_output
$server_output_de = json_decode($server_output);
$entities = $server_output_de->entities;

foreach ($entities as $key => $value) {
	if ($value[0]->name == 'object1') {
		$object1 = $value[0]->value;
	}
	if ($value[0]->name == 'object2') {
		$object2 = $value[0]->value;
	}
	if ($value[0]->name == 'object3') {
		$object3 = $value[0]->value;
	}
	if ($value[0]->name == 'object4') {
		$object4 = $value[0]->value;
	}
}

$intent_array = $server_output_de->intents;
$intent_value = $intent_array[0]->name;

//echo $server_output;
curl_close($ch);  //close the connection

// echo $subject.",".$object2.",".$object.",".$intent_value;

exit(json_encode(array("object1" => $object1, "object2" => $object2, "object3" => $object3, "object4" => $object4, "intent" => $intent_value)));

parent . window . location . reload();
