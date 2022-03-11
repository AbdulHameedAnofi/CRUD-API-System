<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Header: Content-Type, Access-Control-Allow-Header, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once "../config/initialize.php";

$post = new Users($conn);
// $post->createUser();

$result = json_decode(file_get_contents("php://input"));

$post->name = $result->name;
$post->username = $result->username;
$post->email = $result->email;
$post->password = $result->password;
$post->created_at = date('Y-m_d H:i:s');

if ($post->createUser()) {
    echo json_encode(array('message' => 'User created successfuly.'));
}
else {
    echo json_encode(array('message' => 'Unable to create User accont'));
}