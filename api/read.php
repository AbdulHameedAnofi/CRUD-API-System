<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

//initializing our api
require_once('../config/initialize.php');

//instanciating the users class
$post = new Users($conn);
//getting the read function query
$readFunction = $post->read();
//get row count
$users = $readFunction->rowCount();

if ($users > 0) {
    $all_arr = array();
    $all_arr['data'] = array();

    while ($row = $readFunction->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
                    'id' => $id,
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'created_at' => $created_at
        );
        array_push($all_arr['data'], $post_item);
    }
    //converting to JSON and output
    echo json_encode($all_arr);
}
else {
    echo json_encode(array("message" => "No posts found."));
}