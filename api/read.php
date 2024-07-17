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

$item->id = isset($_GET['id']) ? intval($_GET['id']) : null;
$item->name = isset($_GET['name']) ? htmlspecialchars(strip_tags($_GET['name'])) : null;
$item->email = isset($_GET['email']) ? htmlspecialchars(strip_tags($_GET['email'])) : null;
$item->job = isset($_GET['job']) ? htmlspecialchars(strip_tags($_GET['job'])) : null;

if ($item->id !== null) {
    $item->getById();
    if ($item->id !== null) {
        $emp_arr = array(
            "id" => $item->id,
            "name" => $item->name,
            "email" => $item->email,
            "job" => $item->job,
            "created" => $item->created
        );

        http_response_code(200);
        echo json_encode($emp_arr);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Data tidak ditemukan berdasarkan id."));
    }
} else if ($item->name !== null) {
    $item->getByName();
    if ($item->name !== null) {
        $emp_arr = array(
            "id" => $item->id,
            "name" => $item->name,
            "email" => $item->email,
            "job" => $item->job,
            "created" => $item->created
        );

        http_response_code(200);
        echo json_encode($emp_arr);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Data tidak ditemukan berdasarkan nama."));
    }
} else if ($item->email !== null) {
    $item->getByEmail();
    if ($item->email !== null) {
        $emp_arr = array(
            "id" => $item->id,
            "name" => $item->name,
            "email" => $item->email,
            "job" => $item->job,
            "created" => $item->created
        );

        http_response_code(200);
        echo json_encode($emp_arr);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Data tidak ditemukan berdasarkan email."));
    }
} else if ($item->job !== null) {
    $item->getbyJob();
    if ($item->job !== null) {
        $emp_arr = array(
            "id" => $item->id,
            "name" => $item->name,
            "email" => $item->email,
            "job" => $item->job,
            "created" => $item->created
        );

        http_response_code(200);
        echo json_encode($emp_arr);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Data tidak ditemukan berdasarkan job."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Tidak ada parameter pencarian yang valid."));
}