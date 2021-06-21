<?php

include "../Note.php";

header("Access-Control-Allow-Origin: *");

if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['author_id'])){
    $note = new Note();

    if($note->addNote($_POST['title'], $_POST['description'], $_POST['author_id'])){
        echo json_encode(["status" => "success"]);
    }else{
        echo json_encode(["status"=>"error"]);
    }
}else{
    echo json_encode(["status"=>"error"]);
}