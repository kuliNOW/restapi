<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../database.php';
include_once '../data.php';

$database = new Database();

$db = $database->getConnection();
$items = new Data($db);
$records = $items->getDataAll();
$itemCount = $records->num_rows;
echo json_encode($itemCount);
if ($itemCount > 0) {
    $data = array();
    $data["body"] = array();
    $data["itemCount"] = $itemCount;
    while ($row = $records->fetch_assoc()) {
        array_push($data["body"], $row);
    }
    echo json_encode($data);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "Tidak ada record")
    );
}