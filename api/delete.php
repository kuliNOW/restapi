<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../data.php';

$database = new Database();
$db = $database->getConnection();
$item = new Data($db);

$item->id = isset($_GET['id']) ? $_GET['id'] : die();

if ($item->deleteData()) {
    echo json_encode("Data terhapus.");
} else {
    echo json_encode("Data gagal dihapus.");
}