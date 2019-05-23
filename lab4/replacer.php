<?php

header('Content-Type: application/json');

require_once "func.php";

$url = "http://www.mocky.io/v2/5c7db5e13100005a00375fda";
$json = file_get_contents($url);
$result = json_decode($json);

$result->result = str_replace(" ", "_", $result->result);
$response = json_encode(Obj($result), JSON_UNESCAPED_UNICODE);
echo $response;

SaveExample("../lab4.json", $response);

?>