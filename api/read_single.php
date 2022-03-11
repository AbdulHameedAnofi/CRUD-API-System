<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once('../config/initialize.php');

//instanciating the user class
$post = new Users($conn);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();
$read_singleMethod = $post->read_single();

if ($post->name != null) {
    $post_arr = array(
                'id' => $post->id,
                'name' => $post->name,
                'username' => $post->username,
                'email' => $post->email,
                'created_at' => $post->created_at
    );
    echo json_encode($post_arr);
}
else {
    echo json_encode(array("message" => "User doesn't exist."));
}