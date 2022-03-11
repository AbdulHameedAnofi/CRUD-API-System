<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/initialize.php";

$post = new Users($conn);

$result = json_decode(file_get_contents("php://input"));

$post->id = $result->id;

if ($post->deleteUser()) {
    echo json_encode(array("message" => "User has been deleted"));
}
else {
    echo json_encode(array("message" => "User does not exist"));
}