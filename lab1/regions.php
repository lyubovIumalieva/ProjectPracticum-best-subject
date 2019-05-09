<?php
header('Content-Type: application/json');
$n = basename($_SERVER['REQUEST_URI']);
$codes = json_decode(file_get_contents("region.json"));
$res = $codes->$n;

$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$res_array = array(
		'url' => $url,
		'response' => $res,
		'method' => $_SERVER['REQUEST_METHOD']);

$json_res = json_encode($res_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
file_put_contents("answer.json", $json_res . "\n", FILE_APPEND | LOCK_EX);

?>
