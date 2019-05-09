<?php

function fibonachi($n)
{
    return round(pow((sqrt(5)+1)/2, $n)/sqrt(5));
}

header('Content-Type: application/json');

$number = basename($_SERVER['REQUEST_URI']);
if($number > 0) $res = fibonachi($number);
else $res = null;

$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$res_array = array(
		'url' => $url,
		'response' => $res,
		'method' => $_SERVER['REQUEST_METHOD']);

$json_res = json_encode($res_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
file_put_contents("result.json", $json_res . "\n", FILE_APPEND | LOCK_EX);


?>