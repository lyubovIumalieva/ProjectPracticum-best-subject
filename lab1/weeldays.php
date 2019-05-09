<?php
header('Content-Type: application/json');
$date = $_GET['date'];
$d_m_y = explode(".", $date);
$res = date("l", mktime(0, 0, 0, $d_m_y [1], $d_m_y [0], $d_m_y [2]));

$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$res_array = array(
		'url' => $url,
		'response' => $res,
		'method' => $_SERVER['REQUEST_METHOD']);
$json_res = json_encode($res_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
file_put_contents("result.json", $json_res . "\n", FILE_APPEND | LOCK_EX);
?>