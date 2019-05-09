<?php
header('Content-Type: application/json');
	$a = $_GET['a'];
	$b = $_GET['b'];
	$c = $_GET['c'];
	$D = ($b*$b) - (4*$a*$c);
$res = array();
if ($D>0) {
    $res[] = (-$b + sqrt($D)) / (2*$a);
    $res[] = (-$b - sqrt($D)) / (2*$a);
}
else
	if ($D==0) $res[] = -$b / (2*$a);
	else $res[] = null;

$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$res_array = array(
		'url' => $url,
		'response' => $res,
		'method' => $_SERVER['REQUEST_METHOD']);

$json_res = json_encode($res_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
file_put_contents("result.json", $json_res . "\n", FILE_APPEND | LOCK_EX);

?> 