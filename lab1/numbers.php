<?php
header('Content-Type: application/json');
$number = basename($_SERVER['REQUEST_URI']);
$number_formatter = new NumberFormatter("ru", NumberFormatter::SPELLOUT);
$res = $number_formatter->format($number);


$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$res_array = array(
		'url' => $url,
		'response' => $res,
		'method' => $_SERVER['REQUEST_METHOD']);

$json_res = json_encode($res_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
file_put_contents("answer.json", $json_res . "\n", FILE_APPEND | LOCK_EX);

?>